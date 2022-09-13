@php echo '<?php' @endphp

namespace App\Filament\Resources\{{ $resource }}\Pages;

use App\Filament\Resources\{{ $resource }};
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use App\Exports\{{ $pluralModelName }}Export;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{{ $model }};
use Filament\Forms;

class List{{ $pluralModelName }} extends ListRecords
{
    protected static string $resource = {{ $resource }}::class;

    protected function getActions(): array
    {
        return array_merge(parent::getActions(), [
            Action::make('export')
                ->button()
                ->action('export'),
        ]);
    }

    public function export()
    {
        return Excel::download(new {{ $pluralModelName }}Export, '{{ Str::lower($pluralModelName) }}.xlsx');
    }
}
