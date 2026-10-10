@csrf
<label>Kategori</label><select name="category_id" required><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id',$product->category_id ?? '')==$category->id)>{{ $category->name }}</option>@endforeach</select>@error('category_id')<div class="error">{{ $message }}</div>@enderror
<label>SKU</label><input name="sku" value="{{ old('sku',$product->sku ?? '') }}" required>@error('sku')<div class="error">{{ $message }}</div>@enderror
<label>Nama produk</label><input name="name" value="{{ old('name',$product->name ?? '') }}" required>@error('name')<div class="error">{{ $message }}</div>@enderror
<label>Harga</label><input type="number" min="0" step=".01" name="price" value="{{ old('price',$product->price ?? 0) }}" required>@error('price')<div class="error">{{ $message }}</div>@enderror
<label>Batas stok rendah</label><input type="number" min="0" name="minimum_stock" value="{{ old('minimum_stock',$product->minimum_stock ?? 5) }}" required>@error('minimum_stock')<div class="error">{{ $message }}</div>@enderror
<div class="actions"><button type="submit">Simpan</button><a class="btn" href="{{ route('products.index') }}">Kembali</a></div>
