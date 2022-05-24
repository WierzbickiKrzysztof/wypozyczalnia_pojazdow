<x-layout>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
        <script src="/public/assets/css/tabelka.css" ></script>
    </head>
    <body>
        <div class="container-fluid" style=" margin-bottom: 50px;">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <h3 class="text-white mb-4">Lista Opcji dodatkowych</h3>
                    <a class="btn btn-primary fs-5 me-2 py-2 px-4" role="button" href="/opcje/dodaj_opcje">Dodaj wyposażenie</a>
                </div>
            </div>
            <div id="TableSorterCard" class="card" style="border-style: none;border-radius: 6.5px;">
                <div class="card-header py-3" style="border-width: 0px;background: rgb(23,25,33);">
                    <div class="row table-topper align-items-center">
                        <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                            <p class="m-0 fw-bold" style="color: rgb(255,255,255);">Opcje Dodatkowe</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive" style="border-top-style: none;background: #171921;">
                            <table id="ipi-table" class="table table-striped table tablesorter">
                                <thead class="thead-dark" style="background: rgb(33,37,48);border-width: 0px;border-color: rgb(0,0,0);border-bottom-color: #21252F;">
                                <tr style="border-style: none;border-color: rgba(255,255,255,0);background: #21252f;">
                                    <th style="color: rgb(255,255,255);">Opcja</th>
                                    <th style="color: rgb(255,255,255);">Opis</th>
                                    <th style="color: rgb(255,255,255);">Cena</th>
                                    <th style="color: rgb(255,255,255);" class="text-center filter-false sorter-false">Akcje</th>
                                </tr>
                                </thead>
                                @foreach($opcje as $opcje)
                                    <tbody class="text-center" style="border-top-width: 0px;">
                                    <tr style="background: #262a38;">
                                        <td style="color: rgb(255,255,255); "><a>{{ $opcje->name }}</a></td>
                                        <td style="color: rgb(255,255,255);">{{ $opcje->opis }}</td>
                                        <td style="color: rgb(255,255,255);">{{ $opcje->cena}}</td>
                                        <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btnMaterial btn-flat success semicircle" role="button" href="/opcje/edytuj_opcje/{{ $opcje->id }}" style="color: rgb(0,197,179);"><i class="fas fa-pen"></i></a></td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>
