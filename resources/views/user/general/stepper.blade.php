<div class="col-lg-12">
            <button  onclick="location.href='{{ route($_base_route.'.create')}}';" class="btn @if(Request::segment(3) == "step1") btn-success @else btn-info @endif  btn-xs" id="" style="width: 220px;height:40px;"><h6><a href="" style="color: #fff;">१. किसान प्रोफाइल</a></h6></button>

            <button onclick="location.href='{{ route($_base_route.'.create')}}';" class="btn @if(Request::segment(3) == "step2") btn-success @else btn-info @endif  btn-xs" id="" style="width: 202px;height:40px;"> <h6><a href="" style="color: #fff;">२ .पारिवारिक बिबरण</a></h6></button>

            <button class="btn @if(Request::segment(3) == "step3") btn-success @else btn-info @endif  btn-xs" id="" style="width: 220px;height:40px;"><h6><a href="" style="color: #fff;"> ३. जग्गा बिबरण</a></h6></button>

            <button class="btn @if(Request::segment(3) == "step4") btn-success @else btn-info @endif  btn-xs" id="" style="width: 220px;height:40px;"><h6> <a href="" style="color: #fff;">४. कामदार बिबरण</a> </h6></button>

</div>
