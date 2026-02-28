<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        // Funkcia pre DELETE ochranu
        DB::unprepared('
            CREATE OR REPLACE FUNCTION prevent_protected_admin_delete()
            RETURNS trigger AS $$
            BEGIN
                IF OLD.protected = true THEN
                    RAISE EXCEPTION \'Protected admin cannot be deleted\';
                END IF;

                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;
        ');

        // Trigger pre DELETE
        DB::unprepared('
            CREATE TRIGGER protect_admin_delete
            BEFORE DELETE ON users
            FOR EACH ROW
            EXECUTE FUNCTION prevent_protected_admin_delete();
        ');

        // Funkcia pre UPDATE ochranu (úplné zamknutie)
        DB::unprepared('
            CREATE OR REPLACE FUNCTION prevent_protected_admin_update()
            RETURNS trigger AS $$
            BEGIN
                IF OLD.protected = true THEN
                    RAISE EXCEPTION \'Protected admin cannot be modified\';
                END IF;

                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ');

        // Trigger pre UPDATE
        DB::unprepared('
            CREATE TRIGGER protect_admin_update
            BEFORE UPDATE ON users
            FOR EACH ROW
            EXECUTE FUNCTION prevent_protected_admin_update();
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS protect_admin_delete ON users;');
        DB::unprepared('DROP FUNCTION IF EXISTS prevent_protected_admin_delete();');

        DB::unprepared('DROP TRIGGER IF EXISTS protect_admin_update ON users;');
        DB::unprepared('DROP FUNCTION IF EXISTS prevent_protected_admin_update();');
    }
};
