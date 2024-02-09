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
            "Pays de résidence",
            "Ville de résidence",
            "Sexe",
            "Parrain",
            "Electeur",
            "Date d'inscrtion",
            "PDCI-RDA"
            ];
        }

        public function collection(){
            $data = User::select('nom', 'prenoms', 'numero', 'autre_numero', 'email', 'pays', 'ville', 'sexe', 'parrain', 'electeur','created_at', 'pdci_rda')->get();
            return collect($data);
        }
}
