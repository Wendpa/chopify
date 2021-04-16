@component('mail::message')
# Du nouveau sur Chopify!

Un nouveau produit vient d'être modifié sur votre plateforme Chopify!
N'hésitez pas à le consulter en cliquant sur le bouton ci-dessous.

@component('mail::button', ['url' => url('produits')])
Voir le produit
@endcomponent

Merci d'avoir choisi Chopify pour votre shoping,<br>
{{ config('app.name') }}
@endcomponent
