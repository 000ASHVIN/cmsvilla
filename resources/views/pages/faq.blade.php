@extends('layouts.master')
@section('banner')
<div class="contact-banner">
    <div class="container">
        <center>
            <h1 class="clean-title is-1 mt-5 mb-5" style="color: white">
                {{ $faq->name }}
            </h1>
        </center>
    </div>
</div>
@endsection
@section('content')
    <div class="section is-medium">
        <div class="container">
            <div class="faq-wrapper">
                <div class="columns">
                    <div class="column is-5 is-offset-1">
                        @php $i=0; @endphp
                        @foreach ($faqs as $key => $row)
                            @if ($key % 2 == 0)
                                <div class="faq-block">
                                    <div class="block-header">
                                        <div class="header-icon" id="heading{{ $key }}">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <h3>{{ $row->faq_title }}</h3>
                                    </div>
                                    <div class="block-body" id="collapse{{ $key }}">
                                        {!! $row->faq_content !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="column is-5">
                        @php $i=0; @endphp
                        @foreach ($faqs as $key => $row)
                            @if ($key % 2 != 0)
                                <div class="faq-block">
                                    <div class="block-header">
                                        <div class="header-icon" id="heading{{ $key }}">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <h3>{{ $row->faq_title }}</h3>
                                    </div>
                                    <div class="block-body" id="collapse{{ $key }}">
                                        {!! $row->faq_content !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_faq) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $faq->name }}</h1>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $faq->detail !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 faq">
                    <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                        @php $i=0; @endphp
                        @foreach ($faqs as $row)
                            @php $i++; @endphp
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $i }}">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                                        {{ $row->faq_title }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $i }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $i }}">
                                <div class="panel-body">
                                    {!! $row->faq_content !!}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
