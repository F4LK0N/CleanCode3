### Resumo - Aula 2



# Test Driven Development

## Problemas de não ter testes automatizados
- Não ter testes aumenta o tempo de feedback;
- Não ter confiança no código; 
- Parece que o código vai desmoronar a qualquer momento;
- Estamos sempre "torcendo para que o código funcione";
- Viramos preenchedores àgeis e profissionais de formulários e telas do sistema;

## O que é um Teste Automatizado
- Testa uma responsabilidade do código;
- Given, When, Then (Dado, Quando, Então):
  - Given (Definição de todas as informações necessárias para executar o comportamento a ser testado);
  - When (Executar o comportamento);
  - Then (Verifica o que aconteceu após a execução, comparando as informações retornadas com a expectativa criada);

## Tipos de Testes Automatizados
- Unit (Unidade)
- Integration (Integração)
- End-to-end (Ponta a Ponta)

O ideal é termos uma combinação de diversos tipos de testes.

## Como funciona o Test Drive Development
- TDD é um método para construir software, não para testá-lo
- Ciclo de desenvolvimento TDD:
  - Write a test that fails;
  - Make the code work;
  - Eliminate redundancy;

## Pensamento sobre TDD (Kent Beck)
- "TDD is a way of managing fear during programming"

## As três leis do TDD (Robert C. Martin)
- Você não pode escrever nenhum código até ter escrito um teste que detecte uma possível falha;
- Você não pode escrever mais testes de unidade do que o suficiente para detectar a falha;
- Você não pode escrever mais código do que o suficiente para passar nos testes;

## Porque programadores se frustram ao tentar escrever testes no início 
- Escrever os testes requer muita disciplina;
- Existe muita ansiedade, queremos sempre ver tudo funcionando;
- Nos acostumamos a começar pela tela ou pelo banco de dados, não pelo domínio;
- Muitas vezes não temos informações suficientes para começar a desenvolver;
- Muitas vezes a arquitetura não é testável;

## O que fazer com uma arquitetura acoplada
- Um teste double é um padrão que tem o objetivo de substituir um DOC (depended-on component) em um determinado tipo de teste por motivos de performance ou segurança.

### Test Double
- Dummy
- Stubs
- Spies
- Mock
- Fake

#### Dummy
Objetos que criamos apenas para completar a lista de parâmetros que precisamos passar para invocar um determinado método.

#### Stubs
Objetos que retornam respostas prontas, definidas para um determinado teste, por questão de performance ou segurança.  
(exemplo: quando eu executar o método fazer pedido preciso que o método pegar cotação do dólar retorne R$3,00)

#### Spies
Objetos que "espionam" a execução do método e armazenam os resultados para verificação posterior.  
(exemplo: quando eu executar o método fazer pedido preciso saber se o método enviar email foi invocado internamente e com quais parâmetros)

#### Mocks
Objetos similares a stubs e spies, permitem que você diga exatamente o que quer que ele faça e o teste vai quebrar se isso não acontecer.

#### Fake
Objetos que tem implementações que simulam o funcionamento da instância real, que seria utilizada em produção.  
(exemplo: uma base de dados em memória)
