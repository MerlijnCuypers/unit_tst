<div class="col-xs-6" id="pic1Box">
    <img class="col-xs-12 img-thumbnail" src="img/{{ $election->picture1->file }}" />
    <span class="col-xs-12" >{{ $election->picture1->name }}</span>
    <input type="hidden" id="pic1Id" name="pic1Id" value ="{{ $election->picture1->id }}" />
</div>
<div class="col-xs-6" id="pic2Box">
    <img class="col-xs-12 img-thumbnail" src="img/{{ $election->picture2->file }}" />
    <span class="col-xs-12" >{{ $election->picture2->name }}</span>
    <input type="hidden" id="pic2Id"  name="pic2Id" value ="{{ $election->picture2->id }}" />
</div>
{{ csrf_field() }}