# 🎓 Plataforma EducaCursos

Breve descrição do projeto: O **EducaCursos** é uma plataforma de gestão de aprendizado (LMS) desenvolvida em Laravel 11 / PHP 8.2, projetada para gerenciar cursos, categorias, matrículas, métricas de acesso e emissão automatizada de certificados.

---

## 🚀 Status de Desenvolvimento e Entregas

Este repositório está organizado de acordo com as etapas de desenvolvimento solicitadas:

- [x] **1ª Etapa:** Planejamento e Requisitos do Sistema.
- [x] **2ª Etapa:** Modelagem Conceitual e Lógica do Banco de Dados.
- [x] **3ª Etapa:** Configuração do Framework e Implementação das Migrations.
- [ ] **4ª Etapa:** (Próxima etapa do seu cronograma).

---

## 📊 2ª Etapa — Modelagem do Banco de Dados

Para evitar poluição visual na raiz do projeto e manter a documentação técnica isolada do código-fonte, toda a especificação da arquitetura de dados foi centralizada:

* 📑 **Documentação Detalhada das Tabelas:** [Clique aqui para acessar o documento de Descrição e Definição das Tabelas](https://drive.google.com/file/d/1dH7VU-odr8mP1GrRSjhAUaNVEr4kYQIh/view?usp=sharing)
* 🗺️ **Modelagem e Diagrama do Banco:** [Clique aqui para visualizar o Diagrama de Entidades e Relacionamentos](https://dbdiagram.io/d/69fa9ddc7a923b9472272943)

### Resumo da Arquitetura Relacional
O ecossistema é composto por 6 tabelas core interconectadas:
1. `users`: Gerencia perfis (Alunos e Administradores) e autenticação.
2. `categorias`: Classifica os cursos para fins de indexação.
3. `cursos`: Catálogo contendo carga horária, modalidade e ementas.
4. `inscricoes`: Entidade associativa (pivô) que monitora status e progresso (0% a 100%).
5. `certificados`: Registro de validação e emissão de diplomas após a conclusão.
6. `metricas_acesso`: Logs de auditoria para análise de engajamento na plataforma.

---

## 🛠️ 3ª Etapa — Estrutura e Migrations (Laravel)

As definições modeladas na etapa anterior foram integralmente portadas para o framework através do sistema de Migrations do Laravel.

### Como rodar as Migrations localmente:
1. Configure as credenciais do seu banco de dados no arquivo `.env`.
2. Certifique-se de que o serviço do MySQL está rodando (XAMPP, Laragon, etc.).
3. Execute o comando no seu terminal:
   ```bash
   php artisan migrate