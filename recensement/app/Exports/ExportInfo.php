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
            "Prenoms",
            "Numéro WhatsApp",
            "Autre numéro",
            "Email",
            "Pays de résidence",
            "Chef-lieu de Région de provenance",
            "Ville de résidence",
            "Sexe",
            "Parrain",
            "Electeur",
            "PDCI-RDA",
            "Date d'inscrtion"
            ];
        }

        public function collection(){
            $data = User::select('nom', 'prenoms', 'numero', 'autre_numero', 'email', 'pays','chef_lieu', 'ville_residence', 'sexe', 'parrain', 'electeur', 'pdci_rda')
                ->get()
                ->map(function ($user) {
                    $user->created_at_formatted = Carbon::parse($user->created_at)->format('d-m-Y');
                    return $user;});
            return collect($data);
        }
}
