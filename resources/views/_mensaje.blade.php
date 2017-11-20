@if(Session::has('info'))
<div class="animatedParent">
    <div class="alert alert-info animated bounceInRight">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <b> {{Session::get('info')}} </b>
    </div>
</div>
@endif