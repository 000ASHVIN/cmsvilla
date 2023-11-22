<div class="row">
    <div class="col">
        <label for="">metaTitle</label>
        <input type="text" class="form-control" name="meta_title" value="{{ $seo->meta_title ?? '' }}">
    </div>
    <div class="col">
        <label for="">metaDescription</label>
        <input type="text" class="form-control" name="meta_description" value="{{ $seo->meta_description ?? '' }}">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="photo">metaImage*</label>
        <div class="form-group">
            <div>
                <input type="hidden" value="{{ $seo->meta_image ?? ''}}" name="current_photo">
                @if(isset($seo->meta_image))
                    <img src="{{ asset('storage/' . $seo->meta_image) }}" alt="" class="w_200">
                @else
                    <p>No meta image available</p>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="">Change Photo</label>
            <div>
                <input type="file" name="meta_image">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col"></div>
    </div>
</div>
<label for="photo">Facebook</label>
<div class="row"
    style="border-top: 2px solid #4E88E7;border-left: 2px solid #4E88E7; border-right: 2px solid #4E88E7;padding: 15px;">
    <div class="col">
        <label for="">facebookTitle*</label>
        <input type="text" class="form-control" name="facebook_title" value="{{ $seo->facebook_title  ?? ''}}">
    </div>
    <div class="col">
        <label for="">facebookDescription*</label>
        <input type="text" class="form-control" name="facebook_description" value="{{ $seo->facebook_description  ?? ''}}">
    </div>
</div>
<div class="row"
    style="border-bottom: 2px solid #4E88E7;border-left: 2px solid #4E88E7;border-right: 2px solid #4E88E7; padding: 15px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-6">
                <label for="photo">facebookImage*</label>
                <div class="form-group">
                    <div>
                        <input type="hidden" value="{{ $seo->facebook_image  ?? ''}}" name="current_facebook_image">
                        @if(isset($seo->facebook_image))
                        <img src="{{ asset('storage/' . $seo->facebook_image)  ?? ''}}" alt="" class="w_200">
                        @else
                            <p>No facebook image available</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Change Photo</label>
                    <div>
                        <input type="file" name="facebook_image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col"></div>
    </div>
</div>
<label for="photo" class="mt-2">Twitter</label>
<div class="row"
    style="border-top: 2px solid #4E88E7;border-left: 2px solid #4E88E7; border-right: 2px solid #4E88E7;padding: 15px;">
    <div class="col">
        <label for="">twitterTitle*</label>
        <input type="text" class="form-control" name="twitter_title" value="{{ $seo->twitter_title  ?? ''}}">
    </div>
    <div class="col">
        <label for="">twitterDescription*</label>
        <input type="text" class="form-control" name="twitter_description" value="{{ $seo->twitter_description  ?? ''}}">
    </div>
</div>
<div class="row"
    style="border-bottom: 2px solid #4E88E7;border-left: 2px solid #4E88E7;border-right: 2px solid #4E88E7; padding: 15px;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="photo">twitterImage*</label>
            <div class="form-group">
                <div>
                    <input type="hidden" value="{{ $seo->twitter_image  ?? ''}}" name="current_twitter_image">
                    @if(isset($seo->twitter_image))
                    <img src="{{ asset('storage/' . $seo->twitter_image) }}" alt="" class="w_200">
                    @else
                    <p>No Twitter image available</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="">Change Photo</label>
                <div>
                    <input type="file" name="twitter_image">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col"></div>
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="" class="mt-2">keyWords</label>
        <input type="text" class="form-control" name="key_words" value="{{ $seo->key_words  ?? ''}}">
    </div>
    <div class="col">
        <label for="" class="mt-2">metaRobots</label>
        <input type="text" class="form-control" name="meta_robots" value="{{ $seo->meta_robots  ?? ''}}">
    </div>
</div>
