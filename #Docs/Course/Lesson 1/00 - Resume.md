### Resumo - Aula 1



# Clean Code

## Problemas no código
- Codigo fonte bagunçado não sabe por onde começar;
- Partes do codigo que só uma pessoa sabe mexer;
- Medo de mexer numa coisa e estragar outra;
- Mais defeitos para corrigir do que funcionalidades para implementar;
- Necessario fazer horas extras para poder entregar;
- Ninguem quer fazer deploy na sexta-feira;

## Porque isso acontece
- Qualidade do codigo;
- Legibilidade do codigo;
- Dificuldade de entendimento de oque o codigo esta fazendo;
- Acumulo de aninhamentos no codigo;
- Acumulo de complexidade no codigo;
- Nomes da variaveis não descrevem oque elas carregam;
- Passamos a maior parte do tempo lendo o codigo;

## Pair Programming
- Menos interrupções
- Maior qualidade
- Compartilhamento de Conhecimento
- Nivelamento técnico

## Problemas do código ruim
- Sensação de estar realizando um trabalho braçal e desgastantes;
- Maior incidência de defeitos;
  - "The logic should be straightforward and make ir hard for bugs to hide"
    - Bjarne Stroustrup (Criador do C++)
- Menos produtividade;
- Ninguem se sente bem fazendo gambiarra;
- Aumenta a rotatividade da equipe (Evasão de funcionarios);
- Afeta toda a empresa;
- Dificulta as estimativas de desenvovilmento;
- Aumenta a reclamação de clientes;
- Dificulta a evolução do produto;
- Cria um impacto financeiro;

## O que motiva uma pessoa
- Dinheiro;
- Ambiente de trabalho;
- Crescimento profissional;

## O que é Clean Code
- "Clean code is simple and direct"
  - Grady Booch (Criador do UML)
  
- "Clean code always looks like is written by someone who cares"
  - Michael Feathers (Autor do livro Working Effectively with Legacy Code)
  
- "You know you are working on clean code when each routine you read turns out to be pretty much what you expected"
  - Ward Cunningham (Criador da Wiki)

- "Any fool can write code that a computer can understand. Good programmers write code that humans can understand"
  - Martin Fowler (Um dos maiores autores sobre desenvolvimento de software)

## Como medir a qualidade do código
- Linhas de código?
- Número de métodos?
- Número de classes?
- Tamanho dos métodos?
- Complexidade?
- Numero de reclamações ao lidar com o codigo;

## Como identificar um codigo ruim:
- Muitos aninhamentos no codigo;
- Muita complexidade no código;
- Nomes das variaveis não descrevem o que elas carregam;
- Nomes das funções e metodos não descrevem o que elas fazem;
- Código muito extenso misturando varias areas e motivos diferentes;

## Refatoramento
- Evite chegar ao ponto de não retorno;
- Refatore antes que seja tarde demais;
- Refatore o código diariamente;
- Refatore partes pequenas do código sempre que possivel;



# Refactoring

## O que é refactoring
- "Alteração feita na estrutura interna do software para torná-lo mais fácil de ser entendido e menos custoso de ser modificado, sem alterar o seu comportamento observável"
  - Martin Fowler
- Refactoring é um investimento, torna o código sustentável e competitivo;

## Problemas da falta de refactoring 
- Dia após dia a falta de refactoring consume o tempo da equipe;
- Aumento da divida técnica;

## Quando refatorar
- Refatore com propósito, evite refatorar apenas por refatorar;
- Fique atento as oportunidas;
- Quando for adicionar uma nova funcionalidade;
- Quando for corrigir um defeito;
- Quando precisar entender uma parte do código;

## Como evitar que a dívida técnica se acumule
- É nossa responsabilidade garantir a qualidade do nosso trabalho;
- Reconhecer e lidar no dia a dia com os code smells;
- Refatorar;



# Code Smells e Técnicas de Refactoring

## Nomes Estranhos
Nomes que não refletem o seu conteudo ou ação, como x, j, temp.
- Renomei as variavies para nomes que reflitam o seu conteúdo;
- Renomei as funções e métodos para nomes que reflitam a ação que esta fazendo;
- Evite a mistura de idiomas no código;

## Variavies desnecessarias
Variaveis que podiam ser retornadas diretamente;
- Internalizar variável temporária;

## Números mágicos]
Um numero aleatorio no meio do código, que é dificil de determinar o que é.
- Substituir números mágicos por constantes com nomes explicativos;

## Comentarios
Comentarios em cima de cada linha de codigo descrevendo o que ela esta fazendo.
- Encapsular partes do código dentro de métodos e funções com nomes autoexplicativos; 

## Código morto
Codigo comentado dentro dos arquivos.
- Remover o código;
- Utilizar o sistema de versionamento;

## Linhas em branco
Linhas em branco entre cada, ou determinadas linhas do código aumentando a area necessaria de tela para mostrar o codigo.
- Remover as linhas de código em branco;

## Retornos estranhos
Funções e métodos que retornam tipos diferentes de dados de acordo a situação.
- Padronizar as saidas das funções e métodos;
- Utilizar exceções para mostrar os erros;

## Condições Confusas
Condições que são dificeis de entender e que na sua estrutura de código se distanciam da margem.
- Trazer código para perto da margem;
- Consolidar fragmentos condicionais duplicados;
- Condicionar expressão condicional;
- Introduzir comando ternário;
- Remover comando ternário;

## Switch Statements
- Substituir switch por polimorfismo;

## Métodos Longos
- Extrair método;
- Internalizar método;

## Longa lista de parametros
- Preservar o objeto inteiro;
- Introduzir objeto parâmetro;
- Extrair classe;
- Remover atribuições a parâmetros;

## Falta de tratamento de exceções
Exceções que atravessam muitas camadas sem ser tratadas.
- Tratar exceções de forma adequeda;
- Lançar exceções com informações;
- Substituir tratamento de exceção por condição;
- Relançar exceções adequadas ao domínio;

## Classes grandes
- Extrair classe;
