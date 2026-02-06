@extends('layouts.app')
@push('seo')
    <x-privacidade.tags />
@endpush
@section('content')
<div class="bg-brand-cream min-h-screen py-16">
    <div class="container mx-auto px-4 max-w-8xl">
    

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 p-8 md:p-16 relative overflow-hidden">
            <!-- Detalhe decorativo -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#013886] via-[#019171] to-[#ffd51b]"></div>

            <div class="prose prose-lg max-w-none text-gray-600">
                <h1 class="text-3xl md:text-4xl font-bold text-[#013886] mb-8">Política de Privacidade e Termos de Uso</h1>
                
                <!-- Aumentei para text-2xl e melhorei a cor/altura de linha -->
                <p class="lead text-2xl text-gray-600 font-light mb-12 leading-relaxed">
                    A transparência é um dos nossos pilares fundamentais. Este documento explica como coletamos, utilizamos e protegemos as informações em nossa plataforma, em conformidade com a legislação brasileira vigente.
                </p>

                <!-- Aumentei os títulos H3 para text-xl -->
                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">1. Origem dos Dados</h3>
                <p>
                    O <strong>CNPJ Nacional</strong> atua como um motor de busca e visualização de dados empresariais. Todas as informações exibidas em nossa plataforma (como Razão Social, CNPJ, Capital Social, Endereço e CNAE) são de <strong>domínio público</strong> e foram obtidas diretamente da base de dados abertos da <strong>Receita Federal do Brasil</strong>, disponível no portal <a href="https://dados.gov.br/dados/conjuntos-dados/cadastro-nacional-da-pessoa-juridica---cnpj" target="_blank" rel="nofollow" class="text-[#013886] hover:underline font-semibold">Dados.gov.br</a>.
                </p>
                <p>
                    Nosso serviço se limita a coletar, organizar e facilitar o acesso a esses dados, conforme permitido pela <strong>Lei de Acesso à Informação</strong> (<a href="https://www.planalto.gov.br/ccivil_03/_ato2011-2014/2011/lei/l12527.htm" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">Lei nº 12.527/2011</a>) e pelo <strong>Decreto de Dados Abertos</strong> (<a href="https://www.planalto.gov.br/CCIVIL_03/_Ato2015-2018/2016/Decreto/D8777.htm" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">Decreto nº 8.777/2016</a>), que institui a Política de Dados Abertos do Poder Executivo Federal.
                </p>

                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">2. Tratamento de Dados Pessoais (LGPD)</h3>
                <p>
                    Respeitamos integralmente a <strong>Lei Geral de Proteção de Dados</strong> (<a href="https://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2018/Lei/L13709.htm" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">Lei nº 13.709/2018</a>). Embora os dados de Pessoas Jurídicas sejam públicos, entendemos que dados de Pessoas Físicas (como sócios) podem estar vinculados. Por isso, adotamos as seguintes medidas de privacidade por padrão:
                </p>
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>Ocultação de Endereços Residenciais:</strong> Não exibimos o endereço completo (rua, número e complemento) de empresas classificadas como MEI (Microempreendedor Individual) que utilizam residência como sede, limitando a exibição apenas ao Município e UF.</li>
                    <li><strong>Proteção de Contato:</strong> Telefones e e-mails pessoais não são indexados ou exibidos publicamente em nossa busca principal para evitar spam e uso indevido.</li>
                    <li><strong>Quadro Societário:</strong> A exibição de nomes de sócios é restrita e segue rigorosamente o que já é divulgado publicamente pela fonte oficial.</li>
                </ul>

                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">3. Finalidade do Uso</h3>
                <p>
                    Os dados disponíveis nesta plataforma têm como finalidade exclusiva:
                </p>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Consulta de regularidade cadastral de empresas;</li>
                    <li>Análise de mercado e concorrência;</li>
                    <li>Verificação de dados para fins de compliance e due diligence;</li>
                    <li>Fins acadêmicos e jornalísticos.</li>
                </ul>
                <p>
                    É estritamente proibido utilizar os dados aqui coletados para práticas de spam, telemarketing abusivo, fraudes ou qualquer atividade ilícita.
                </p>

                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">4. Remoção de Dados</h3>
                <p>
                    Reconhecemos o direito dos titulares de solicitar a desvinculação de seus dados de nossa plataforma. Se você é o representante legal de uma empresa e deseja remover as informações exibidas, disponibilizamos uma ferramenta automática para isso.
                </p>
                <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 my-6">
                    <p class="mb-4 text-blue-900 font-medium">Para solicitar a remoção, acesse a página da empresa em questão e clique no botão "Remover CNPJ" localizado ao final das informações. O processo é gratuito e imediato em nossa base de dados.</p>
                    <p class="text-xs text-blue-700">Nota: A remoção em nosso site não apaga os dados da base oficial da Receita Federal nem de outros indexadores de busca (como Google) instantaneamente.</p>
                </div>

                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">5. Cookies e Tecnologias de Rastreamento</h3>
                <p>
                    Utilizamos cookies apenas para melhorar a experiência de navegação (como manter seus filtros de busca ativos) e para fins estatísticos anônimos (Google Analytics), visando entender como nosso site é utilizado e aprimorar nossos serviços. Não vendemos dados de navegação a terceiros.
                </p>

                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">6. Fundamentação Legal e Fontes Oficiais</h3>
                <p>
                    Para conferência da veracidade, publicidade e legalidade das informações exibidas, disponibilizamos abaixo os links diretos para as fontes oficiais do Governo Federal:
                </p>
                <ul class="space-y-3 mt-4 text-sm font-medium">
                    <li class="flex items-start gap-2">
                        <i class="bi bi-link-45deg text-[#013886] text-lg"></i>
                        <a href="https://dados.gov.br/dados/conjuntos-dados/cadastro-nacional-da-pessoa-juridica---cnpj" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">
                            Fonte dos Dados: Cadastro Nacional da Pessoa Jurídica - CNPJ (Dados.gov.br)
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="bi bi-link-45deg text-[#013886] text-lg"></i>
                        <a href="https://www.planalto.gov.br/ccivil_03/_ato2011-2014/2011/lei/l12527.htm" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">
                            Lei nº 12.527/2011 - Lei de Acesso à Informação (LAI)
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="bi bi-link-45deg text-[#013886] text-lg"></i>
                        <a href="https://www.planalto.gov.br/CCIVIL_03/_Ato2015-2018/2016/Decreto/D8777.htm" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">
                            Decreto nº 8.777/2016 - Política de Dados Abertos
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="bi bi-link-45deg text-[#013886] text-lg"></i>
                        <a href="https://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2018/Lei/L13709.htm" target="_blank" rel="nofollow" class="text-[#013886] hover:underline">
                            Lei nº 13.709/2018 - Lei Geral de Proteção de Dados Pessoais (LGPD)
                        </a>
                    </li>
                </ul>

                <h3 class="text-[#019171] font-bold text-xl mt-10 mb-4">7. Alterações nesta Política</h3>
                <p>
                    Reservamo-nos o direito de atualizar esta política a qualquer momento para refletir mudanças na legislação ou em nossos serviços. Recomendamos a visita periódica a esta página.
                </p>

                <div class="mt-12 pt-8 border-t border-gray-100 text-sm text-gray-400">
                    <p>Última atualização: {{ date('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection