# Desafio Tinnova 🚀

Olá, Sou Aurelio Miguel! 

Aqui você encontrará a implementação das **5 tasks solicitadas** usando Laravel. 💻✨

---

## 🧰 Pré-requisitos

Antes de começar, verifique se tem instalado:
    - 🐘 **PHP ≥ 8.1**
    - 📦 **Composer** (Gerenciador de pacotes PHP)
    - 🟢 **Node.js ≥ 16.x** (Para o frontend dinâmico)
    - 🚀 **PNPM** (Recomendado mas não obrigatório!)
    - 🗃️ **SQLite** (Banco de dados simplificado)

---

## ⚙️ Configurando o Projeto

Siga estes passos para iniciar:

1. **Clone o repositório**  

    ```bash
    git clone https://github.com/miguelARocha/tinnova_challenge.git & cd tinnova_challenge
    ```

2. **Utilize o script de inicialização**  
    ```bash
    php artisan app:setup
    ```

**Agora é só iniciar o app** 

---

## 🚀 Executando o Projeto Manualmente

1. **Inicie o servidor Laravel**  
    ```bash
    php artisan serve
    ```

2. **Inicie o Vite (Frontend)**  
    ```bash
    pnpm dev
    ```

🎉 **Pronto!** Acesse em: [http://localhost:8000](http://localhost:8000)

---


### Tarefas

## 📊 Tarefa 1: Cálculo de Percentuais de Votos

**Acesse os resultados de duas formas:**
1. **Interface Gráfica:**  
   Após iniciar o servidor, acesse:  
   🔗 [http://localhost:8000/eleicao](http://localhost:8000/eleicao)  
   *Visualize um gráfico interativo com Chart.js*

2. **Endpoint da API (JSON):**  
   ⚡ `GET /api/eleicao`  
   ```bash
    curl http://localhost:8000/api/eleicao
   ```
    *Retorna os percentuais em formato JSON*
---

## 🔄 Tarefa 2: Algoritmo Bubble Sort

**Como utilizar:**
1. **Interface Gráfica:**  
   Após iniciar o servidor, acesse:  
   🔗 [http://localhost:8000/bubble](http://localhost:8000/bubble)  
   *Visualize um passo a passo da ordenação*

**Testes automatizados:**

```bash
    php artisan test --filter=BubbleSortTest
```
---

## 🔢 Tarefa 3: Cálculo de Fatorial

**Como usar:**
1. **Interface Web:**  
   🔗 [http://localhost:8000/fatorial](http://localhost:8000/fatorial)  
   *Insira um número e veja o resultado instantaneamente*

**Testes automatizados:**

```bash
    php artisan test --filter=FatorialTest
```
---

## ➕ Tarefa 4: Soma de Múltiplos de 3 ou 5

**Como usar:**
1. **Interface Web:**  
   🔗 [http://localhost:8000/somamultiplos](http://localhost:8000/somamultiplos)  
   *Insira um número limite e veja a soma calculada*

**Testes automatizados:**

```bash
    php artisan test --filter=SomaMultiplos
```
---

## 🚗 Tarefa 5: Sistema de Cadastro de Veículos

**Gerencie veículos com uma API RESTful completa e interface SPA:**

### **Interface Gráfica (SPA)**
🔗 [http://localhost:8000/veiculos](http://localhost:8000/veiculos)  
*Recursos:*
- 📝 Cadastro/Edição de veículos com validação em tempo real
- 🗑️ Exclusão segura com confirmação
- 📊 Relatórios dinâmicos:
  - Veículos não vendidos
  - Distribuição por década de fabricação
  - Registros da última semana

---

### **Endpoints da API**  
⚡ **Métodos suportados:** GET, POST, PUT, DELETE, PATCH

| Método | Endpoint                     | Descrição                          |
|--------|------------------------------|------------------------------------|
| GET    | `/api/veiculos`              | Lista todos veículos (filtros: `?marca=Ford&ano=2020`) |
| POST   | `/api/veiculos`              | Cria novo veículo                  |
| GET    | `/api/veiculos/{id}`         | Detalhes de um veículo específico  |
| PUT    | `/api/veiculos/{id}`         | Atualiza todos campos do veículo   |
| DELETE | `/api/veiculos/{id}`         | Remove veículo permanentemente    |

### **📈 Relatórios Especiais**  
| Endpoint                              | Descrição                          |
|---------------------------------------|------------------------------------|
| `/api/veiculos/relatorios/nao-vendidos` | Total de veículos não vendidos    |
| `/api/veiculos/relatorios/por-decada`   | Distribuição por década (ex: 1990 -> 15 veículos) |
| `/api/veiculos/relatorios/ultima-semana`| Veículos cadastrados nos últimos 7 dias |

---

### **📦 Estrutura do Veículo (JSON)**
```json
{
  "veiculo": "Fiesta",
  "marca": "Ford",
  "ano": 2020,
  "descricao": "Carro em bom estado",
  "vendido": false
}
```

### **❗ Validações**
  - Marcas válidas: Ford, Chevrolet, Volkswagen, Fiat, Honda, Toyota, Hyundai
  - Ano: Entre 1900 e ano atual + 1
  - Campos obrigatórios: Todos exceto vendido (default: false)

### **🛠️ Testando a API**

**Criar veículo:**
```bash
    curl -X POST http://localhost:8000/api/veiculos \
    -H "Content-Type: application/json" \
    -d '{"veiculo":"Gol","marca":"Volkswagen","ano":2022,"descricao":"Novo"}'
```

**Listar Não Vendidos**
```bash
    curl http://localhost:8000/api/veiculos/relatorios/nao-vendidos
```

**Testes automatizados:**

```bash
    php artisan test --filter=VeiculosTest
```
---


Mantenha o console aberto e um café ☕ por perto.