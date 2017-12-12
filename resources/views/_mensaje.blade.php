@if(Session::has('info'))
<div class="">
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <b> {{Session::get('info')}} </b>
    </div>
</div>
@endif