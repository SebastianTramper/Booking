<form action="/packages/update/{{ $id }}" method="POST">
    @csrf
    @method("PUT")
    <div>
        <label for="name">Naam</label>
        <input id="name" name="name" type="text" value="{{ $name }}" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div>
        <label for="description">Beschrijving</label>
        <input id="description" type="text" name="description" value="{{ $description }}" class="@error('description') is-invalid @enderror">
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="image_url">Afbeelding</label>
        <input id="image_url" name="image_url" type="text" value="{{ $image_url }}" class="@error('image_url') is-invalid @enderror">
        @error('image_url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="price">Prijs</label>
        <input id="price" type="text" name="price"  value="{{ $price }}" class="@error('price') is-invalid @enderror">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <input id="submit" type="submit" value="Opslaan">
    </div>

</form>
