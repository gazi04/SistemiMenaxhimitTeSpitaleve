<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('admins')->insert([
            ['id' => 3, 'id_number' => 'A00000002', 'personal_id' => '1234', 'name' => 'Gazmend', 'email' => 'gazmend@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-10 14:02:09', 'updated_at' => '2024-12-16 10:08:45'],
            ['id' => 4, 'id_number' => 'A00000003', 'personal_id' => '1235', 'name' => 'Edi', 'email' => 'edi@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-12 06:29:15', 'updated_at' => '2025-01-10 12:42:11'],
            ['id' => 5, 'id_number' => 'A00000004', 'personal_id' => '1236', 'name' => 'Dion', 'email' => 'dion@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-20 04:13:02', 'updated_at' => '2024-12-20 04:32:18'],
            ['id' => 6, 'id_number' => 'A00000005', 'personal_id' => '1237', 'name' => 'Art', 'email' => 'art@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-20 04:55:36', 'updated_at' => '2024-12-20 04:55:36'],
            ['id' => 7, 'id_number' => 'A00000006', 'personal_id' => '1238', 'name' => 'Donat', 'email' => 'donat@gmail.com', 'is_employed' => 1, 'created_at' => '2025-02-01 22:24:08', 'updated_at' => '2025-02-01 22:24:08']
        ]);

        DB::table('departaments')->insert([
            ['id' => 1, 'name' => 'Neurologjia', 'description' => 'Departamenti Neurologjik ofron kujdes të specializuar për trajtimin...', 'created_at' => '2024-12-06 13:53:52', 'updated_at' => '2024-12-08 14:48:15'],
            ['id' => 9, 'name' => 'Oftamologjia', 'description' => 'Departamenti ynë i oftalmologjisë ofron shërbime...', 'created_at' => '2024-12-08 13:06:26', 'updated_at' => '2025-02-05 23:48:41'],
            ['id' => 10, 'name' => 'Kirurgjia', 'description' => 'Departamenti Kirurgjik ofron një gamë të gjerë shërbimesh...', 'created_at' => '2024-12-08 13:13:36', 'updated_at' => '2024-12-20 04:41:28']
        ]);

        DB::table('doctors')->insert([
            [ 'id' => 1, 'id_number' => 'D00000001', 'personal_id' => '722906', 'departament_id' => 1, 'first_name' => 'Dardan', 'last_name' => 'Adnani', 'phone_number' => '044339875', 'email' => 'dardan@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-06 14:17:04', 'updated_at' => '2025-02-06 10:01:07', ],
            [ 'id' => 3, 'id_number' => 'D00000002', 'personal_id' => '1233312', 'departament_id' => 10, 'first_name' => 'Rinor', 'last_name' => 'Selimi', 'phone_number' => '044394283', 'email' => 'rinorselimi@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-10 16:28:13', 'updated_at' => '2025-02-06 10:36:33', ],
            [ 'id' => 5, 'id_number' => 'D00000003', 'personal_id' => '999876', 'departament_id' => 1, 'first_name' => 'Orges', 'last_name' => 'Arifi', 'phone_number' => '044673265', 'email' => 'orgesi@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-20 11:03:33', 'updated_at' => '2024-12-20 12:16:08', ],
            [ 'id' => 6, 'id_number' => 'D00000004', 'personal_id' => '12543', 'departament_id' => 9, 'first_name' => 'Bardh', 'last_name' => 'Shabani', 'phone_number' => '044351345', 'email' => 'bardhsh@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-20 11:05:37', 'updated_at' => '2024-12-20 11:05:37', ],
            [ 'id' => 7, 'id_number' => 'D00000005', 'personal_id' => '789897789', 'departament_id' => 10, 'first_name' => 'Gazmend', 'last_name' => 'Halili', 'phone_number' => '045891786', 'email' => 'gazmend@gmail.com', 'is_employed' => 1, 'created_at' => '2025-02-01 13:05:31', 'updated_at' => '2025-02-01 13:05:31', ],
        ]);

        DB::table('patients')->insert([
            [ 'id' => 1, 'id_number' => 'P00000001', 'personal_id' => '123123', 'first_name' => 'Dimal', 'last_name' => 'Hajrizi', 'gender' => 1, 'phone_number' => '045123989', 'email' => 'dimalhajrizi2025@gmail.com', 'created_at' => '2024-12-06 14:17:04', 'updated_at' => '2025-02-06 16:26:18', 'email_verification_token' => null, 'email_verified_at' => '2025-01-01', ],
            [ 'id' => 6, 'id_number' => 'P00000002', 'personal_id' => '12342358', 'first_name' => 'Olti', 'last_name' => 'Bekteshi', 'gender' => 1, 'phone_number' => '045681376', 'email' => 'oltibekteshi@gmail.com', 'created_at' => '2024-12-25 07:26:33', 'updated_at' => '2025-01-09 05:08:46', 'email_verification_token' => null, 'email_verified_at' => '2025-01-09', ],
            [ 'id' => 7, 'id_number' => 'P00000003', 'personal_id' => '1324321', 'first_name' => 'Rona', 'last_name' => 'Beqiri', 'gender' => 0, 'phone_number' => '044479832', 'email' => 'ronabeqiri@gmail.com', 'created_at' => '2024-12-26 09:38:17', 'updated_at' => '2025-02-06 10:50:31', 'email_verification_token' => null, 'email_verified_at' => '2025-02-06', ],
            [ 'id' => 8, 'id_number' => 'P00000004', 'personal_id' => '2314231', 'first_name' => 'Donat', 'last_name' => 'Beqiri', 'gender' => 1, 'phone_number' => '045784293', 'email' => 'd.beqiri@gmail.com', 'created_at' => '2024-12-26 09:50:20', 'updated_at' => '2024-12-26 11:37:55', 'email_verification_token' => null, 'email_verified_at' => '2024-12-26', ],
            [ 'id' => 10, 'id_number' => 'P00000005', 'personal_id' => '123890', 'first_name' => 'Gazmend', 'last_name' => 'Halili', 'gender' => 1, 'phone_number' => '045681372', 'email' => 'gazmendhalili@gmail.com', 'created_at' => '2025-01-14 17:01:53', 'updated_at' => '2025-02-06 10:51:06', 'email_verification_token' => null, 'email_verified_at' => '2025-01-14', ],
        ]);

        DB::table('nurses')->insert([
            [ 'id' => 1, 'id_number' => 'N00000001', 'personal_id' => '8374', 'first_name' => 'Anesa', 'last_name' => 'Behluli', 'phone_number' => '04978409', 'email' => 'anesabehluli@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-06 14:17:04', 'updated_at' => '2024-12-20 13:31:04', ],
            [ 'id' => 2, 'id_number' => 'N00000002', 'personal_id' => '8476', 'first_name' => 'Ardi', 'last_name' => 'Kadriu', 'phone_number' => '045681376', 'email' => 'Ardi.kadriu@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-09 16:19:24', 'updated_at' => '2024-12-20 13:29:15', ],
            [ 'id' => 4, 'id_number' => 'N00000003', 'personal_id' => '1234', 'first_name' => 'Enes', 'last_name' => 'Krasniqi', 'phone_number' => '044314412', 'email' => 'Enes.k@gmail.com', 'is_employed' => 0, 'created_at' => '2024-12-20 15:09:14', 'updated_at' => '2024-12-20 15:15:03', ],
            [ 'id' => 5, 'id_number' => 'N00000004', 'personal_id' => '2314', 'first_name' => 'Rina', 'last_name' => 'Kqiku', 'phone_number' => '044378014', 'email' => 'rina.kqiku@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-20 16:12:11', 'updated_at' => '2024-12-20 16:12:11', ],
        ]);

        DB::table('receptionists')->insert([
            [ 'id' => 1, 'id_number' => 'R00000001', 'personal_id' => '830285', 'first_name' => 'Adi', 'last_name' => 'Ramadani', 'phone_number' => '04581904', 'email' => 'adi.r@icloud.com', 'is_employed' => 1, 'created_at' => '2024-12-06 14:17:04', 'updated_at' => '2024-12-06 14:17:04', ],
            [ 'id' => 2, 'id_number' => 'R00000002', 'personal_id' => '6637362', 'first_name' => 'Blend', 'last_name' => 'Arifi', 'phone_number' => '049756327', 'email' => 'blendarifi@gmail.com', 'is_employed' => 0, 'created_at' => '2024-12-10 16:31:13', 'updated_at' => '2024-12-15 14:42:32', ],
            [ 'id' => 4, 'id_number' => 'R00000003', 'personal_id' => '56566', 'first_name' => 'Rreze', 'last_name' => 'Dermaku', 'phone_number' => '044380412', 'email' => 'rrezedermaku@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-20 15:43:19', 'updated_at' => '2024-12-20 15:52:28', ],
        ]);

        DB::table('technologists')->insert([
            [ 'id' => 1, 'id_number' => 'T00000001', 'personal_id' => '529484', 'first_name' => 'Fidan', 'last_name' => 'Maloku', 'phone_number' => '049812874', 'email' => 'Fidanm@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-06 14:17:04', 'updated_at' => '2025-02-01 19:11:56', ],
            [ 'id' => 2, 'id_number' => 'T00000002', 'personal_id' => '123124', 'first_name' => 'Astrit', 'last_name' => 'Murseli', 'phone_number' => '045523498', 'email' => 'murseliastrit@gmail.com', 'is_employed' => 1, 'created_at' => '2024-12-10 16:33:29', 'updated_at' => '2024-12-20 16:07:58', ],
            [ 'id' => 3, 'id_number' => 'T00000003', 'personal_id' => '983214', 'first_name' => 'Arbnor', 'last_name' => 'Hasani', 'phone_number' => '044409782', 'email' => 'Arbnor.hasani@gmail.com', 'is_employed' => 0, 'created_at' => '2024-12-20 16:13:45', 'updated_at' => '2024-12-20 16:22:00', ],
        ]);

        DB::table('diagnoses')->insert([
            [ 'id' => 1, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Shkëputje e ligameteve ne krahun e djatht', 'created_at' => '2025-01-09 12:44:28', 'updated_at' => '2025-01-09 12:44:28', ],
            [ 'id' => 2, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Ftohje sezonale', 'created_at' => '2025-01-14 15:57:00', 'updated_at' => '2025-01-14 15:57:00', ],
            [ 'id' => 3, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Dhimbje koke', 'created_at' => '2025-01-15 13:22:47', 'updated_at' => '2025-01-15 13:22:47', ],
            [ 'id' => 4, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Dhimbje koke', 'created_at' => '2025-01-15 13:36:03', 'updated_at' => '2025-01-15 13:36:03', ],
            [ 'id' => 5, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Ndezje muskujsh', 'created_at' => '2025-01-15 13:37:44', 'updated_at' => '2025-01-15 13:37:44', ],
            [ 'id' => 6, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Ftohje e zakonshme (Rinofaringjit akut)', 'created_at' => '2025-02-06 14:43:39', 'updated_at' => '2025-02-06 14:43:39', ],
        ]);

        DB::table('therapies')->insert([
            [ 'id' => 1, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Daleron', 'created_at' => '2025-01-15 13:22:47', 'updated_at' => '2025-01-15 13:22:47', ],
            [ 'id' => 2, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Ozempik', 'created_at' => '2025-01-15 13:36:03', 'updated_at' => '2025-01-15 13:36:03', ],
            [ 'id' => 3, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Aspirin', 'created_at' => '2025-01-15 13:37:44', 'updated_at' => '2025-01-15 13:37:44', ],
            [ 'id' => 4, 'patient_id' => 1, 'doctor_id' => 3, 'notes' => 'Merrni qetësues të dhimbjeve pa recetë, si paracetamol ose ibuprofen, për të lehtësuar dhimbjet dhe temperaturën', 'created_at' => '2025-02-06 14:43:39', 'updated_at' => '2025-02-06 14:43:39', ],
        ]);

        DB::table('appointments')->insert([
            ['id' => 1, 'patient_id' => 1, 'doctor_id' => 5, 'diagnoses_id' => 1, 'therapy_id' => null, 'start_time' => '2025-01-08 10:00:00', 'end_time' => '2025-01-08 12:00:00', 'status' => 'pending', 'created_at' => '2025-01-08 19:01:20', 'updated_at' => '2025-01-08 19:01:20'],
            ['id' => 2, 'patient_id' => 1, 'doctor_id' => 5, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-08 10:00:00', 'end_time' => '2025-01-08 12:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-08 19:06:51', 'updated_at' => '2025-01-08 19:06:51'],
            ['id' => 3, 'patient_id' => 1, 'doctor_id' => 5, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-09 10:00:00', 'end_time' => '2025-01-09 12:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-08 19:18:24', 'updated_at' => '2025-01-08 19:18:24'],
            ['id' => 4, 'patient_id' => 1, 'doctor_id' => 1, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-09 10:00:00', 'end_time' => '2025-01-09 12:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-09 06:46:31', 'updated_at' => '2025-01-09 06:46:31'],
            ['id' => 5, 'patient_id' => 1, 'doctor_id' => 1, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-16 14:00:00', 'end_time' => '2025-01-16 16:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-09 13:56:09', 'updated_at' => '2025-01-09 13:56:09'],
            ['id' => 6, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-17 14:00:00', 'end_time' => '2025-01-17 16:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-10 06:08:11', 'updated_at' => '2025-01-10 06:08:11'],
            ['id' => 7, 'patient_id' => 1, 'doctor_id' => 1, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-10 14:00:00', 'end_time' => '2025-01-10 16:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-10 12:17:07', 'updated_at' => '2025-01-10 12:17:07'],
            ['id' => 8, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-11 18:00:00', 'end_time' => '2025-01-11 20:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-11 16:28:08', 'updated_at' => '2025-01-11 16:28:08'],
            ['id' => 9, 'patient_id' => 6, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-14 12:00:00', 'end_time' => '2025-01-14 14:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-11 16:53:27', 'updated_at' => '2025-01-11 16:53:27'],
            ['id' => 10, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-15 08:00:00', 'end_time' => '2025-01-15 10:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-15 05:43:35', 'updated_at' => '2025-01-15 05:43:35'],
            [ 'id' => 11, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-15 12:00:00', 'end_time' => '2025-01-15 14:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-15 10:53:25', 'updated_at' => '2025-01-15 10:53:25', ],
            [ 'id' => 12, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => 5, 'therapy_id' => 3, 'start_time' => '2025-01-15 14:00:00', 'end_time' => '2025-01-15 16:00:00', 'status' => 'completed', 'created_at' => '2025-01-15 12:56:52', 'updated_at' => '2025-01-15 13:37:44', ],
            [ 'id' => 13, 'patient_id' => 1, 'doctor_id' => 1, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-16 18:00:00', 'end_time' => '2025-01-16 20:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-16 07:55:24', 'updated_at' => '2025-01-16 07:55:24', ],
            [ 'id' => 14, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-01-30 14:00:00', 'end_time' => '2025-01-30 16:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-30 11:15:45', 'updated_at' => '2025-01-30 11:15:45', ],
            [ 'id' => 15, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-02-01 12:00:00', 'end_time' => '2025-02-01 14:00:00', 'status' => 'Në pritje', 'created_at' => '2025-01-30 18:43:01', 'updated_at' => '2025-01-30 18:43:01', ],
            [ 'id' => 16, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-02-01 18:00:00', 'end_time' => '2025-02-01 20:00:00', 'status' => 'Anuluar', 'created_at' => '2025-01-30 18:48:18', 'updated_at' => '2025-01-30 18:48:48', ],
            [ 'id' => 17, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-02-04 20:00:00', 'end_time' => '2025-02-04 22:00:00', 'status' => 'Mbërriti në spital', 'created_at' => '2025-02-03 11:26:48', 'updated_at' => '2025-02-04 22:25:39', ],
            [ 'id' => 18, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-02-05 12:00:00', 'end_time' => '2025-02-05 14:00:00', 'status' => 'Në pritje', 'created_at' => '2025-02-03 11:41:24', 'updated_at' => '2025-02-03 11:41:24', ],
            [ 'id' => 19, 'patient_id' => 1, 'doctor_id' => 3, 'diagnoses_id' => 6, 'therapy_id' => 4, 'start_time' => '2025-02-06 12:00:00', 'end_time' => '2025-02-06 16:00:00', 'status' => 'completed', 'created_at' => '2025-02-06 15:13:52', 'updated_at' => '2025-02-06 14:43:39', ],
            [ 'id' => 20, 'patient_id' => 6, 'doctor_id' => 3, 'diagnoses_id' => null, 'therapy_id' => null, 'start_time' => '2025-02-10 12:00:00', 'end_time' => '2025-02-10 14:00:00', 'status' => 'Në pritje', 'created_at' => '2025-02-06 15:14:54', 'updated_at' => '2025-02-06 15:14:54', ],
        ]);

        DB::table('medications')->insert([
            [ 'id' => 1, 'name' => 'Daleron', 'type' => 'Infuzion', 'dose' => '300ml', 'description' => 'Per qetsimin e dhimbjeve', 'stock' => 39, 'created_at' => '2025-01-30 21:01:31', 'updated_at' => '2025-01-30 21:01:38', ],
            [ 'id' => 2, 'name' => 'Daleron', 'type' => 'Infuzion', 'dose' => '500mg', 'description' => 'Daleron per qetesimin e dhimbjeve', 'stock' => 45, 'created_at' => '2025-02-06 15:56:20', 'updated_at' => '2025-02-06 15:59:21', ],
        ]);

        DB::table('tests')->insert([
            [ 'id' => 1, 'patient_id' => 1, 'technologist_id' => 1, 'test_type' => 'Analiza gjaku', 'results' => "Hemoglobin 30ng\r\nEritrocite 50ng\r\nTrombocite 60ng\r\nLeukocite 20ng", 'created_at' => '2025-02-03 12:36:04', 'updated_at' => '2025-02-03 12:36:04', ],
            [ 'id' => 3, 'patient_id' => 1, 'technologist_id' => 1, 'test_type' => 'ECG Results', 'results' => "Sinus Rhythm: Regular\r\nRate: 72 bpm\r\nPR Interval: 0.16 sec\r\nQRS Duration: 0.08 sec", 'created_at' => '2025-02-03 12:41:42', 'updated_at' => '2025-02-03 12:41:42', ],
            [ 'id' => 4, 'patient_id' => 10, 'technologist_id' => 1, 'test_type' => 'X-Ray Chest Results', 'results' => "Findings: Clear lungs. No acute cardiopulmonary process.\r\nImpression: Normal chest radiograph.", 'created_at' => '2025-02-03 12:42:03', 'updated_at' => '2025-02-03 12:42:03', ],
            [ 'id' => 5, 'patient_id' => 6, 'technologist_id' => 1, 'test_type' => 'COVID-19 PCR Test Results', 'results' => "Result: Negative\r\nMethod: RT-PCR", 'created_at' => '2025-02-03 12:42:31', 'updated_at' => '2025-02-03 12:42:31', ],
            [ 'id' => 6, 'patient_id' => 6, 'technologist_id' => 1, 'test_type' => 'Lipid Profile', 'results' => "Total Cholesterol: 180 mg/dL\r\nHDL Cholesterol: 60 mg/dL\r\nLDL Cholesterol: 100 mg/dL\r\nTriglycerides: 120 mg/dL", 'created_at' => '2025-02-03 12:43:27', 'updated_at' => '2025-02-03 12:43:27', ],
            [ 'id' => 7, 'patient_id' => 1, 'technologist_id' => 1, 'test_type' => 'Liver Function Tests (LFTs)', 'results' => "Alanine Transaminase (ALT): 20 U/L\r\nAspartate Transaminase (AST): 25 U/L\r\nAlkaline Phosphatase (ALP): 80 U/L\r\nBilirubin (Total): 0.8 mg/dL", 'created_at' => '2025-02-03 12:43:46', 'updated_at' => '2025-02-03 12:43:46', ],
            [ 'id' => 8, 'patient_id' => 7, 'technologist_id' => 1, 'test_type' => 'Kidney Function Tests (KFTs)', 'results' => "Blood Urea Nitrogen (BUN): 10 mg/dL\r\nCreatinine: 0.9 mg/dL\r\nEstimated Glomerular Filtration Rate (eGFR): 90 mL/min/1.73m2\r\nPotassium: 4.0 mEq/L", 'created_at' => '2025-02-03 12:44:04', 'updated_at' => '2025-02-03 12:44:04', ],
            [ 'id' => 9, 'patient_id' => 10, 'technologist_id' => 1, 'test_type' => 'Thyroid Panel', 'results' => "Thyroid-Stimulating Hormone (TSH): 1.5 mIU/L\r\nFree T4: 1.2 ng/dL\r\nFree T3: 2.5 pg/mL\r\nThyroid Peroxidase Antibodies (TPOAb): Negative", 'created_at' => '2025-02-03 12:44:25', 'updated_at' => '2025-02-03 12:44:25', ],
            [ 'id' => 10, 'patient_id' => 1, 'technologist_id' => 1, 'test_type' => 'Vitamin D Levels', 'results' => "25-Hydroxyvitamin D: 30 ng/mL (Deficient)", 'created_at' => '2025-02-03 12:44:41', 'updated_at' => '2025-02-03 12:44:41', ],
            [ 'id' => 11, 'patient_id' => 7, 'technologist_id' => 1, 'test_type' => 'Allergy Testing', 'results' => "Pollen (Grass): Negative\r\nPollen (Tree): Negative\r\nDust Mites: Positive\r\nPet Dander (Cat): Negative", 'created_at' => '2025-02-03 12:44:58', 'updated_at' => '2025-02-03 12:44:58', ],
            [ 'id' => 12, 'patient_id' => 1, 'technologist_id' => 1, 'test_type' => 'MRI Brain', 'results' => "Findings: No acute intracranial hemorrhage or mass lesion.\r\nImpression: Normal brain MRI.", 'created_at' => '2025-02-03 12:45:20', 'updated_at' => '2025-02-03 12:45:20', ],
            [ 'id' => 13, 'patient_id' => 8, 'technologist_id' => 1, 'test_type' => 'CT Scan Abdomen', 'results' => "Findings: No acute intra-abdominal pathology.\r\nImpression: Unremarkable abdominal CT scan.", 'created_at' => '2025-02-03 12:45:38', 'updated_at' => '2025-02-03 12:45:38', ],
        ]);
    }
}
