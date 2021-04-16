require('./bootstrap');

require('alpinejs');

import Swal from 'sweetalert2';

window.suppressionConfirm = function(formId){

    Swal.fire({
        title: 'Attention !!!!',
        text: "Etes vous sure de vouloir supprimer cet produit?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui',
        cancelButtonText: 'annuler'
      }).then((result) => {
        if (result.isConfirmed) {
              document.getElementById(formId).submit();

        }
      })
}
