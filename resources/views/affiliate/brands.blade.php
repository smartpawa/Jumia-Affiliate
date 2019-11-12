<select class="form-control search-slt" name="brand">
        <option value="0">All Brands</option>
        @foreach ($brands as $brand)
        <option value="{{ $brand->id }}">{{ ucfirst($brand->brand_name) }}</option>
        @endforeach
    </select>
