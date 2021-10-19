### Aula 3



# Arquitetura Limpa

## O que é?

"The goal of software architecture is to 
minimize the human resources required to 
build and maintain the required system"

**Robert Martin**


"Software architecture is those decisions which 
are both important and hard to change"

**Martin Fowler**


## O que levar em consideração?

Escopo
Volume de requisições
Tipo de dispositivo
Equipe
Prazo
Orçamento



## Arquiteturas Disponiveis

Não existe uma que seja perfeita para tudo.

"There's no one size fits all"

Existem varias arquiteturas, para diversos cenarios.

- BCE, Ivar Jacobson (1992)
- Domain-Driven Design, Eric Evans (2003)
- Hexagonal Architecture ou Ports and Adapters, Alistair Cockburn (2005)
- Onion Architecture, Jeff Palermo (2008)
- Clean Architecture, Robert Martin (2012)

Pontos em comum:
- Isolam as regras de negócio
- Definem camadas e suas responsabilidades
- Criam um fluxo de controle e dependência ordenado e direcional
- Favorecem a testabilidade
- São independentes de recursos externos
- Facilitam a evolução tecnológica



## Clean Architecture

A Clean Architecture é um modelo arquitetural 
orientada ao desacoplamento entre as regras de 
negócio, ou domínio, da aplicação e os recursos 
externos como frameworks e banco de dados.

- Desacoplamento



## Dominio

É o problema a ser resolvido.

"The center of your application is not the 
database, nor is it one or more of the frameworks 
you may be using. The center of your application 
is the use cases of your application"

Robert Martin

Entities << Use Cases << Controllers|Gateways << DB|Devices

Entidades são responsáveis por modelar as regras 
de negócio independentes e que podem ser 
aplicadas em qualquer contexto

Regras de negocio independentes



## Entidades

Entidades são responsáveis por modelar as regras 
de negócio independentes e que podem ser 
aplicadas em qualquer contexto

- Regras de negocio
- Independente

Dominio Anêmico?
Objetos sem regras de negocio, somente com dados.

Uma entidade é um conjunto de regras de 
negócio independente pode ser um objeto com 
métodos ou até mesmo um conjunto de funções

São considerados componentes de alto nível de 
abstração e por serem estáveis mudam com menos 
frequência que outras camadas, podendo ser 
reusados com facilidade

Lançam exceções de negócio para proteger seu 
estado interno, também conhecido como invariância

An invariant is something that needs to be true at all 
times, defining what it means for an object data to 
be in a consistent state and are central to the design 
and correctness of object oriented programs



## Use Cases

Tecnica de Modelagem

Um caso de uso é basicamente uma técnica para 
capturar, modelar e especificar requisitos, que foi 
apresentada por Ivar Jacobson em 1987

Na Clean Architecture, os casos de uso contém 
regras de negócio específicas, que resolvem 
problemas aplicando as regras de negócio 
independentes em um contexto

Reparem que os nomes dos casos de uso tem 
relação com a Screaming Architecture

Eles realizam a orquestração das entidades, 
executando regras de negócio independentes

Lançam exceções de negócio que façam sentido no 
contexto do caso de uso

Caso de uso é diferente de CRUD

Casos de uso normalmente envolvem 
algum tipo de persistência


### Como um caso de uso deve fazer para acessar o banco de dados?

- Repository? 
- DAO? 
- Gateway? 
- Active Record? 
- Data Mapper?

Um repositório é uma abstração para uma coleção 
de agregados, normalmente associado ao Domain-Driven Design

Um DAO, ou Data Access Object, é um padrão de 
estrutura que separa a camada de domínio da 
persistência, oferecendo uma interface para 
acessar dados de forma polimórfica

Um Gateway é um objeto que encapsula o acesso 
à um sistema externo ou recurso

No Active Record, um registro em uma tabela do 
banco de dados é encapsulado em um objeto, 
juntando conceitos de domínio e persistência

Um Data Mapper é exatamente o que os ORM's 
fazem, movem dados de um objeto para o banco 
de dados e vice-versa



### Qual padrão deve ser utilizado?

Tanto faz, o caso de uso deve conhecer apenas uma interface

Essa implementação é feita pelo design pattern 
Adapter, por isso essa camada se chama de 
interface adapter

Essa camada faz a ponte entre um 
dispositivo de I/O e os casos de uso

Essa camada implementa todo tipo de 
conversão de dados



## Interface Adapters

Todo código SQL pertence à este camada

Interação com sistema de arquivos e 
qualquer API externa também



## Drivers and Frameworks

Um driver é o nível mais baixo de abstração, é o 
componente que realiza a conexão com o banco 
de dados ou que realiza requisições HTTP

Camada mais externa

Essa camada geralmente configura a 
relação com frameworks e bibliotecas


## Dependency Rule

Nada nas camadas interiores devem conhecer coisas nas camadas do exterior.

Source code dependencies can only point inwards
and nothing in the inner circle can know anything 
at all about something in an outer circle


## Como incializamos a aplicação?

Main

O main é o ponto de entrada da aplicação (HTTP, 
CLI, UI, Testes), é lá que as fábricas e estratégias 
são inicializadas e as injeções de dependência são 
realizadas durante a inicialização

