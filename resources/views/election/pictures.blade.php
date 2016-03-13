<form action="{{ url('election') }}" method="POST" class="form-horizontal">
    <div class="col-xs-6" id="pic1Box">
        <input type="image" id="pic1img" class="col-xs-12 img-thumbnail" src="img/{{ $election->picture1->file }}" />
        <span class="col-xs-12" >{{ $election->picture1->name }}</span>
    </div>
    <input type="hidden" id="wonPicId"  name="wonPicId" value ="{{ $election->picture1->id }}" />
    <input type="hidden" id="lostPicId"  name="lostPicId" value ="{{ $election->picture2->id }}" />
    {{ csrf_field() }}
</form>
<form action="{{ url('election') }}" method="POST" class="form-horizontal">
    <div class="col-xs-6" id="pic2Box">
        <input type="image" id="pic2img" class="col-xs-12 img-thumbnail" src="img/{{ $election->picture2->file }}" />
        <span class="col-xs-12" >{{ $election->picture2->name }}</span>
    </div>
    <input type="hidden" id="wonPicId"  name="wonPicId" value ="{{ $election->picture2->id }}" />
    <input type="hidden" id="lostPicId"  name="lostPicId" value ="{{ $election->picture1->id }}" />
    {{ csrf_field() }}
</form>

<input type="hidden" id="pic1Id" name="pic1Id" value ="{{ $election->picture1->id }}" />
<input type="hidden" id="pic2Id"  name="pic2Id" value ="{{ $election->picture2->id }}" />