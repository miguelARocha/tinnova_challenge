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
---

## 🔢 Tarefa 3: Cálculo de Fatorial

**Como usar:**
1. **Interface Web:**  
   🔗 [http://localhost:8000/fatorial](http://localhost:8000/fatorial)  
   *Insira um número e veja o resultado instantaneamente*
---

## ➕ Tarefa 4: Soma de Múltiplos de 3 ou 5

**Como usar:**
1. **Interface Web:**  
   🔗 [http://localhost:8000/somamultiplos](http://localhost:8000/somamultiplos)  
   *Insira um número limite e veja a soma calculada*
---



Mantenha o console aberto e um café ☕ por perto.

---