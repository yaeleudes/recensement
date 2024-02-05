<?php
    namespace App\Exports;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use App\Models\User;

    class ExportInfo implements FromCollection, WithHeadings {
        public function headings(): array {

        return [
            "Nom",
            "Prenoms",
            "Numéro WhatsApp",
            "Autre numéro",
            "Email",
            "Pays",
            "Ville",
            "Sexe",
            "Parrain",
            "Electeur",
            "PDCI-RDA"
            ];
        }

        public function collection(){
            $data = User::select('nom', 'prenoms', 'numero', 'autre_numero', 'email', 'pays', 'ville', 'sexe', 'parrain', 'electeur', 'pdci-rda')->get();
            return collect($data);
        }
}
