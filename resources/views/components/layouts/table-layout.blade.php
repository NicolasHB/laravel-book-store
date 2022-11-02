@props([
    'title',
    'price',
    'author',
])

<table class="table-auto w-full px-40 ">
  <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 ">
    <tr class="bg-orange-500 text-black grid grid-cols-4 p-3">
        <td>titre</td>
        <td>prix</td>
        <td>auteur</td>
        <td>
            <div class="text-center">3</div>
        </td>
    </tr> 
    <tr class="grid grid-cols-4 p-5">
      <th>{{ $title }}</th>
      <th>{{ $price }}</th>
      <th>{{ $author }}</th>
      <th>editer</th>
    </tr>
  </thead>
</table>
