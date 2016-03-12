<div class="col-sm-offset-2 col-sm-8" style="margin-top:50px "> 
    <!-- Display Images -->
    <div class="row text-center">
        <div class="col-sm-6" id="pic1Box">
            <img class="col-sm-11" src="img/{{ $election->picture1->file }}" />
            <span class="col-sm-11" >{{ $election->picture1->name }}</span>
            <input type="hidden" id="pic1Id" name="pic1Id" value ="{{ $election->picture1->id }}" />
        </div>
        <div class="col-sm-6" id="pic2Box">
            <img class="col-sm-11" src="img/{{ $election->picture2->file }}" />
            <span class="col-sm-11" >{{ $election->picture2->name }}</span>
            <input type="hidden" id="pic2Id"  name="pic2Id" value ="{{ $election->picture2->id }}" />
        </div>
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    </div> 
</div> 