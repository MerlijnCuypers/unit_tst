<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Http\Requests;
use App\Http\Intervention;

class PictureController extends Controller
{

    /**
     * Display a list of all Pictures.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        return view('pictures.index', [
            'pictures' => Picture::orderBy('name')->get(),
        ]);
    }

    /**
     * Hanlde uploaded file
     * 
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'picture' => 'required|mimes:jpeg,png|max:10000',
            'name' => 'required|string|max:50'
        ]);

        // handle file
        $file = $request->file('picture');
        // make random 16 char hex name for file
        $imageName = substr(md5(mt_rand()), 0, 16) . '.' .
            $file->getClientOriginalExtension();

        // move file to correct location
        $file->move(
            base_path() . '/public/img/', $imageName
        ); 

        //resize image
        $this->_resizeImage( base_path() . '/public/img/'. $imageName, 500, 500, 1);

        // save Picture Obj
        $picture = new Picture;
        $picture->name = ucfirst($request->name);
        $picture->file = $imageName;
        $picture->save();

        // rerandomise matchmaker list to add new picture
        $this->matchmakerRepository->makeNewRandomList();

        // redirect to index page of pictures
        return redirect('pictures');
    }

    private function _resizeImage($image, $width, $height, $scale)
    {
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
        switch ($imageType) {
            case "image/gif":
                $source = imagecreatefromgif($image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source = imagecreatefromjpeg($image);
                break;
            case "image/png":
            case "image/x-png":
                $source = imagecreatefrompng($image);
                break;
        }
        imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $width, $height);

        switch ($imageType) {
            case "image/gif":
                imagegif($newImage, $image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage, $image, 90);
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage, $image);
                break;
        }

        chmod($image, 0777);
        return $image;
    }
}
