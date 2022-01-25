@php echo '<?php' @endphp

namespace App\Filament\Resources\{{ $resource }}\Pages;

use App\Filament\Resources\{{ $resource }};
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\ButtonAction;
use App\Exports\{{ $model }}sExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{{ $model }};
use Filament\Forms;

class List{{ $model }}s extends ListRecords
{
    protected static string $resource = {{ $resource }}::class;

    protected function getActions(): array
    {
        return array_merge(parent::getActions(), [
            ButtonAction::make('export')->action('export'),
        ]);
    }

    public function export()
    {
        return Excel::download(new {{ $model }}sExport, '{{ Str::lower($model) }}s.xlsx');
    }
}
