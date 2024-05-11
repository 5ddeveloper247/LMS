
    @php
        if (1==1) {
        // if (permissionCheck('course.status_update')) {
        $status_enable_eisable = "authnet_enable_disable";
        } else {
        $status_enable_eisable = "";
        }
        $checked = $query->status == 1 ? "checked" : "";
    @endphp

    <label class="switch_toggle" for="active_checkbox{{$query->id}}">
        <input type="radio" class="{{$status_enable_eisable}}"
               id="active_checkbox{{$query->id}}" value="{{$query->id}}"
            {{$checked}} name="authnet-radio" onchange="changeauthnetstat()"><i class="slider round"></i></label>
