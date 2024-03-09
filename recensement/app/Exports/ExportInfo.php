<?php
    namespace App\Exports;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use App\Models\User;
    use Carbon\Carbon;

    class ExportInfo implements FromCollection, WithHeadings {
        public function headings(): array {

        return [
            "Nom",
            "Prénoms",
            "Sexe",
            "Numéro WhatsApp",
            "Autre numéro",
            "Zone de rattachement",
            "Localité de vote",
            "Parrain",
            "Electeur",
            "Militant du PDCI-RDA",
            "Pièce d'identité",
            "Date d'inscrtion"
            ];
        }

        public function collection(){
            $data = User::select('nom', 'prenoms', 'sexe', 'numero', 'autre_numero', 'zone_rattachement', 'zone_vote', 'parrain', 'electeur', 'pdci_rda', 'ma_piece')
                ->get()
                ->map(function ($user) {
                    $user->created_at_formatted = Carbon::parse($user->created_at)->format('d-m-Y H\hi');
                    return $user;});
            return collect($data);
        }
        // public function collection(){
        //     return User::select('nom', 'prenoms', 'sexe', 'numero', 'autre_numero', 'zone_rattachement', 'zone_vote', 'parrain', 'electeur', 'pdci_rda', 'ma_piece', 'created_at')->get();
        // }
}
