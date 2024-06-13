
<style>
    .btn-test {
        background-color: #0d528f !important;
        color: #fff !important;
    }
</style>
<div class="col-lg-12">
    <a href="{{ route($_base_route.'.edit', ['unique_id' => $data['unique_id']])}}" style="color: #fff;">
        <button class="btn @if(Request::segment(3) == "step1") btn-test @else btn-info @endif btn-xs" id="" style="width: 300px;height:40px;">
            <h6>१. किसान प्रोफाइल</h6>
        </button>
    </a>
    <!-- <a href="{{ route($_base_route.'.family-edit', ['unique_id' => $data['unique_id']])}}" style="color: #fff;">
        <button class="btn @if(Request::segment(3) == "step2") btn-test @else btn-info @endif btn-xs" id="" style="width: 202px;height:40px;">
            <h6>२ .पारिवारिक बिबरण</h6>
        </button>
    </a> -->
    <a href="{{ route($_base_route.'.land-edit', ['unique_id' => $data['unique_id']])}}" style="color: #fff;">
        <button class="btn @if(Request::segment(3) == "step3") btn-test @else btn-info @endif btn-xs" id="" style="width: 300px;height:40px;">
            <h6> ३. जग्गा बिबरण</h6>
        </button>
    </a>
    <a href="{{ route($_base_route.'.worker-edit', ['unique_id' => $data['unique_id']])}}" style="color: #fff;">
        <button class="btn @if(Request::segment(3) == "step4") btn-test @else btn-info @endif btn-xs" id="" style="width: 300px;height:40px;">
            <h6> ४. कामदार बिबरण </h6>
        </button>
    </a>
</div>