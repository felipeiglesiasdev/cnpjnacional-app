<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Garante que cria na conexão padrão do Laravel (cnpjnacional_laravel)
        // e não na conexão dos dados públicos se forem separadas.
        Schema::connection(config('database.default'))->create('solicitacoes_remocao', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 14)->index();
            $table->string('razao_social');
            $table->ipAddress('ip_solicitante')->nullable();
            $table->string('user_agent')->nullable();
            $table->boolean('aceitou_termos_dados_publicos')->default(false);
            $table->boolean('aceitou_termos_google')->default(false);
            $table->timestamp('removido_em')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection(config('database.default'))->dropIfExists('solicitacoes_remocao');
    }
};