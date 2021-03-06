{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
@php
// confiData variable layoutClasses array in Helper.php file.
$configData = Helper::applClasses();
@endphp

<html class="loading"
  lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
 >
<!-- BEGIN: Head-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title style="font-size: 20px !important;">@yield('title') - {{@Auth::user()->company}}</title>
  <link rel="apple-touch-icon" href="../../den/images/logo/favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="../../den/images/logo/favicon.ico">
<style type="text/css" media="print">
    @page 
    {
        size:  auto;
        margin: 0mm;
    }
</style>
  {{-- Include core + vendor Styles --}}
  @include('panels.styles')

</head>
<!-- END: Head-->

{{-- @isset(config('custom.custom.mainLayoutType'))
@endisset --}}
@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
@include(($configData['mainLayoutType'] === 'horizontal-menu') ? 'layouts.horizontalAdminLayoutMaster':
'layouts.verticalAdminLayoutMaster')
@else
{{-- if mainLaoutType is empty or not set then its print below line  --}}
<h1>{{'mainLayoutType Option is empty in config custom.php file.'}}</h1>
@endif
<script>

$(document).ready(function () {
$("#seennotify").click(function(){

 $.ajax({
     type: "post",
     url:url+'/admin/seennotification',

 });

});

$("#notificationsdropdown").click(function(){

$.ajax({
    type: "post",
    url:url+'/admin/deletenotification',
       success: function (d) {
            M.toast({
    html: 'Your Seen Your Notifcation'
});

}

});
});
});
  </script>
</html>