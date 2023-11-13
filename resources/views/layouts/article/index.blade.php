<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <style> .tag { background-color: #007BFF; color: white;
    border-radius: 5px; padding: 5px; margin-right: 5px; cursor: pointer; } .remove-tag { margin-left: 5px; cursor:
    pointer; } </style> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js' ]) <link rel=" stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> <title> Article </title> </head>
    <body> @include('layouts.navigation') <div class="container text-center">
    <h1> 🚀 Articles 🚀 </h1> <button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#addArticleModal"> <i class="fas fa-plus"></i> Ajouter un Article </button> <button type="button"
            class="btn btn-secondary"> <i class="fas
            fa-filter"></i> Filtrer les Articles </button>
        </div> <br><br><br> <div class=" modal fade" id="addArticleModal" tabindex="-1" role="dialog"
            aria-labelledby=" exampleModalLabel" aria-hidden="true">
                <div class=" modal-dialog" role="document">
                    <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title"
                        id="exampleModalLabel">Ajouter un Article </h5> <button type="button" class=?close?
                        data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">
                            &times;</span> ?/button?
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"> @csrf
                            <div class="form-group"> <label for="title">Titre de l'article</label> <input type="text"
                                    class="form-control" id="title" name="title" required> </div>
                            <div class="form-group"> <label for="full_text">Contenu de l'article</label> <textarea
                                    class="form-control" id="full_text" name="full_text" rows="4" required></textarea>
                            </div>
                            <div class="form-group"> <label for="image">Image (optionnelle)</label> <input type="file"
                                    class="form-control-file" id="image" name="image"> </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
</div>
</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>
                    <a href="#"><i class="fas fa-edit"></i> Modifier</a> |
                    <a href="#"><i class="fas fa-trash-alt"></i> Supprimer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tags').on('change', function () {
            if ($('#tags :selected').length > 5) {
                alert('You can only select up to 5 tags.');
                // Deselect the last selected option
                $('#tags :selected:last').prop('selected', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#addNewTagButton').click(function () {
            // Navigate to the "Tags" route
            window.location.href = "{{ route('tags') }}";
        });
    });
</script>
</body>

</html>