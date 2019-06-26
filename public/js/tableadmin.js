$(document).ready(function ()
{
    $('#table_JeuUser').DataTable
        (
            {
            "columnDefs": [
                { "orderable": false, "targets": 1 },
                { "orderable": false, "targets": 2 },
                { "orderable": false, "targets": 3 },
                
                { "orderable": false, "targets": 5 },
                { "orderable": false, "targets": 6 }
                
                ],
            "language":
                {
                "lengthMenu": "Affichage de _MENU_ lignes par page",
                "search": "Recherche",
                "zeroRecords": "aucun résultat - Désolé",
                "info": "Nombre de page _PAGE_ de _PAGES_",
                "infoEmpty": "Enregistrement invalide",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate":
                    {
                        "next": "suivante",
                        "previous": "précédente"
                    }
                }
            }
        ); 
    
    $('#table_JeuAdmin').DataTable
        (
            {
                "columnDefs": [
                    { "orderable": false, "targets": 4 },
                    { "orderable": false, "targets": 5 },
                ],
                "language":
                {
                    "lengthMenu": "Affichage de _MENU_ lignes par page",
                    "search": "Recherche",
                    "zeroRecords": "aucun résultat - Désolé",
                    "info": "Nombre de page _PAGE_ de _PAGES_",
                    "infoEmpty": "Enregistrement invalide",
                    "infoFiltered": "(filtrer sur un total de _MAX_ jeux)",
                    "paginate":
                    {
                        "next": "suivante",
                        "previous": "précédente"
                    }
                }
            }
        );

    $('#table_JeuDuree').DataTable
        (
            {
                "columnDefs": [
                    { "orderable": false, "targets": 1 },
                    { "orderable": false, "targets": 2 },
                ],
                "language":
                {
                    "lengthMenu": "Affichage de _MENU_ lignes par page",
                    "search": "Recherche",
                    "zeroRecords": "aucun résultat - Désolé",
                    "info": "Nombre de page _PAGE_ de _PAGES_",
                    "infoEmpty": "Enregistrement invalide",
                    "infoFiltered": "(filtrer sur un total de _MAX_ champ)",
                    "paginate":
                    {
                        "next": "suivante",
                        "previous": "précédente"
                    }
                }
            }
        );
    
    $('#table_JeuNiveau').DataTable
        (
            {
                "columnDefs": [
                    { "orderable": false, "targets": 1 },
                    { "orderable": false, "targets": 2 },
                    { "orderable": false, "targets": 3 },
                ],
                "language":
                {
                    "lengthMenu": "Affichage de _MENU_ lignes par page",
                    "search": "Recherche",
                    "zeroRecords": "aucun résultat - Désolé",
                    "info": "Nombre de page _PAGE_ de _PAGES_",
                    "infoEmpty": "Enregistrement invalide",
                    "infoFiltered": "(filtrer sur un total de _MAX_ champ)",
                    "paginate":
                    {
                        "next": "suivante",
                        "previous": "précédente"
                    }
                }
            }
        );
});