@if(Session::has('error'))
<div class="">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <b> {{Session::get('error')}} </b>
    </div>
</div>
@endif