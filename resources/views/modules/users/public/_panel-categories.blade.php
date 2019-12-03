<div class="form-widget">
    <aside>
        <p class="title">Services Offered
        <p class="subtitle">
            Tell us what you can do and how much you want to earn
        </p>
    </aside>
    <div class="form-widget-content">
        <categories-account-form
                :categories-ids="{{$categories_ids}}"
                :base-category-id="{{$base_category_id}}"
                :categories-ids-with-amounts="{{$categories_ids_with_amounts}}">
        </categories-account-form>
    </div>
</div>
