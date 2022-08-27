
    @csrf
    <label for="">Titulo</label>
    <input type="text" name="title" value="{{ old("title", "$post->title") }}" >
  
    <label for="">Slug</label>
    <input type="text" name="slug"  value="{{ old("title", "$post->slug") }}">

   
    
<button type="submit">Enviar</button>

