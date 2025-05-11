@extends('layouts.app')

@section('title', 'Cadastro de Veículos')

@section('content')
<div id="app" class="container-fluid px-1 py-5 mx-auto">
    <!-- Formulário de Cadastro -->
    <div class="row d-flex justify-content-center">
        <div class="card-body">
            <div class="text-center">
                <h3 v-if="!editandoId">Cadastrar Novo Veículo</h3>
                <h3 v-else>Editar Veículo</h3>

            </div>
            <div class="mb-3">
                <input v-model="novoVeiculo.veiculo" placeholder="Modelo" class="form-control">
            </div>
            <div class="mb-3">
                <select v-model="novoVeiculo.marca" class="form-select">
                    <option v-for="marca in marcasValidas" :value="marca">${ marca }</option>
                </select>
            </div>
            <div class="col-md-12 mb-3 d-flex justify-content-between">
                <div class="col-md-6">
                    <input type="number" v-model="novoVeiculo.ano" placeholder="Ano" class="form-control">
                </div>
                <div class="col-md-6">
                    <select v-model="novoVeiculo.vendido" class="form-select">
                        <option value="false">Disponível</option>
                        <option value="true">Vendido</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <textarea v-model="novoVeiculo.descricao" placeholder="Descrição" class="form-control"></textarea>
            </div>
            <div id="actions" class="mb-3">
                <button @click="salvarVeiculo" class="btn btn-primary">
                    ${ editandoId ? 'Atualizar' : 'Salvar' }
                </button>
                <button @click="limparFormulario" v-if="editandoId" class="btn btn-secondary ms-2">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <!-- Listagem de Veículos -->
    <div class="card mb-4">
        <div class="card-body">
            <h3>Veículos Cadastrados</h3>
            <div id="tabelaVeiculos">
                <table class="table" id="tabelaVeiculos">
                    <thead>
                        <tr style="position: sticky;top: 0px;background: #fff;box-shadow: 1px 0px 3px #33333340;">
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Ano</th>
                            <th>Status</th>
                            <th style="text-align: center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="veiculo in veiculos" :key="veiculo.id">
                            <td>${ veiculo.veiculo }</td>
                            <td>${ veiculo.marca }</td>
                            <td>${ veiculo.ano }</td>
                            <td>${ veiculo.vendido ? 'Vendido' : 'Disponível' }</td>
                            <td style="display: flex;gap: 0px 10px;justify-content: center;">
                                <button @click="excluirVeiculo(veiculo.id)" class="btn btn-danger btn-sm">Excluir</button>
                                <button @click="editarVeiculo(veiculo)" class="btn btn-warning btn-sm">Editar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Relatórios -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>Não Vendidos</h5>
                    <h2>${ relatorios.naoVendidos }</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>Por Década</h5>
                    <div v-for="decada in relatorios.decadas">
                        ${ defineDecada(decada.decada) }: ${ decada.total }
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>Última Semana</h5>
                    <div v-for="veiculo in relatorios.ultimaSemana">
                        ${ veiculo.veiculo } (${ formatDate(veiculo.created_at) })
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const {
        createApp
    } = Vue;

    createApp({
        delimiters: ['${', '}'],
        data() {
            return {
                veiculos: [],
                marcasValidas: @json($marcasValidas),
                novoVeiculo: {
                    veiculo: '',
                    marca: '',
                    ano: '',
                    descricao: '',
                    vendido: false
                },
                relatorios: {
                    naoVendidos: 0,
                    decadas: [],
                    ultimaSemana: []
                }
            }
        },
        mounted() {
            this.carregarVeiculos();
            this.carregarRelatorios();
        },
        methods: {
            async carregarVeiculos() {
                try {
                    const response = await axios.get('/api/veiculos');
                    this.veiculos = response.data;
                } catch (error) {
                    console.error(error);
                }
            },


            async excluirVeiculo(id) {
                if (confirm('Confirmar exclusão?')) {
                    await axios.delete(`/api/veiculos/${id}`);
                    this.carregarVeiculos();
                    this.carregarRelatorios();
                }
            },

            async carregarRelatorios() {
                const [naoVendidos, decadas, ultimaSemana] = await Promise.all([
                    axios.get('/api/veiculos/relatorios/nao-vendidos'),
                    axios.get('/api/veiculos/relatorios/por-decada'),
                    axios.get('/api/veiculos/relatorios/ultima-semana')
                ]);

                this.relatorios = {
                    naoVendidos: naoVendidos.data.count,
                    decadas: decadas.data,
                    ultimaSemana: ultimaSemana.data
                }
            },
            editarVeiculo(veiculo) {
                this.editandoId = veiculo.id;
                this.novoVeiculo = {
                    veiculo: veiculo.veiculo,
                    marca: veiculo.marca,
                    ano: veiculo.ano,
                    descricao: veiculo.descricao,
                    vendido: veiculo.vendido
                };
            },
            async salvarVeiculo() {
                try {
                    if (this.editandoId) {
                        // Atualizar existente
                        await axios.put(`/api/veiculos/${this.editandoId}`, this.novoVeiculo);
                    } else {
                        // Criar novo
                        await axios.post('/api/veiculos', this.novoVeiculo);
                    }

                    this.limparFormulario();
                    this.carregarVeiculos();
                    this.carregarRelatorios();
                } catch (error) {
                    alert('Erro: ' + error.response?.data?.message || 'Erro desconhecido');
                }
            },

            limparFormulario() {
                this.novoVeiculo = {
                    veiculo: '',
                    marca: '',
                    ano: '',
                    descricao: '',
                    vendido: false
                };
                this.editandoId = null;
            },
            formatDate(dateString) {
                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                };
                return new Date(dateString).toLocaleDateString('pt-BR', options);
            },
            defineDecada(ano) {

                const decada = Math.floor(ano / 10) * 10;

                return `${decada.toString().slice(-2)}s`;
            }

        }
    }).mount('#app')
</script>
<style>
    #app {
        background-color: rgb(222, 222, 222);
        padding: 20px;
        border-radius: 10px;
    }

    #actions {
        width: 100%;

        display: inline-flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: row-reverse;
        gap: 0 10px
    }

    #tabelaVeiculos {
        overflow-y: auto;
        max-height: 30dvh;
    }
</style>
@endsection