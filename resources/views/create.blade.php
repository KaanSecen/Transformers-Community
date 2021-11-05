<form action="/create" method="POST">
    @csrf
    <input type="text" name="name" class="form-control me-2 mb-2" placeholder="Name">
    <input type="text" name="email" class="form-control me-2 mb-2" placeholder="Email">
    <input type="text" name="question" class="form-control me-2 mb-2" placeholder="Vraag"></input>
    <button class="btn rounded w-100 mb-3" id="button-search">Verstuur</button>
</form>