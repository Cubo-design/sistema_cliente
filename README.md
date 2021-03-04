# Solução em forma de sistema WEB

Aplicação web para agendamento e gerenciamento de horários e de divulgação de serviços.

-- Ord. Apresentação: 7
--- EMPRESA: CUBO
+ Samela Barbosa Claudino (180026-4)
+ Shantal de Morais Mantovani (180007-8)
+ Victor Pedro de Sousa (180010-8)

SISTEMA SIMPLES DE CADASTRO E LOGIN DE USUÁRIOS EM MULTI-NÍVEL
E CADASTRO DE EVENTOS COM FULLCALENDAR.

Para logar clique no botão "Login" da navbar.

O administrador tem acesso ao dashboard no sistema, nele o usuário pode verificar
qual é o método mais solicitado e qual foi o último registro inserido no BD.
Além de checar quais são os próximos horários reservados e os atendimentos já realizados.
Tem acesso também a uma área onde pode adicionar novos métodos a página inicial do sistema,
e por fim temos uma lista de usuários cadastrados no sistema.

> O sistema de login foi criado com uma biblioteca especifica para o Codeigniter chamada Ion_Auth.

#### Configuração

    application/config/config.php
        --> Mudar a URL base
    
    application/config/database.php
        --> Mudar as configurações do BD

    public/assets/js/util.js
        --> Mudar a URL base e inserir /index.php/ - caso necessário
        (Arquivo que lida diretamente com o Ajax para inserção de imagens)

    application/views/extra/calendario.php
        --> Mudar as configurações da conexão mysqli - Linha 32

    application/views/extra/reserva.php
        --> Mudar as configurações da conexão mysqli - Linha 3

## OBSERVAÇÕES 

O calendário foi uma funcionalidade extremamente dificil de se concluir, e ainda mais, foi feita
de maneira errada. Fizemos com base em tutoriais e na biblioteca fullcalendar e mesmo assim
ficou limitado, não bloqueando os dias com todas as reservas feitas e com problemas nos nomes dos meses

Muito código foi copiado, algo que poderia ter sido evitado com a criação de controladores e libraries
específicos, mas não tivemos tempo de concluir a refatoração do código. E partes, como o calendário de
reservas, não estão 100% orientadas a objeto.

Formulários poderiam passar por mais validações/verificações prezando pela segurança da informação. A regra
de negócio poderia ser mais refinada, trazendo mais informações relevantes para a dona do empreendimento.

Outras funcionalidades foram levantadas no início do desenvolvimento deste projeto, mas a maioria não foi
possível de ser implementada, como um chat de usuários, um chatbot (para tirar dúvidas), envio de imagens 
por usuários, desenvolver um CMS com blog completo, usar ferramentas para deixar o site mais visível na 
internet (como sitemap e analytics), as máscaras poderiam ser melhoradas, o uso de APIs (Whatsapp, 
Instagram e Correios) também poderiam ter otimizado o sistema,  bibliotecas como PHPMailer deveriam ter
sido usadas para o envio de emails e encurtar o caminho de comunicação entre os usuários e a nossa cliente,
a impressão da ficha de anamnese ficou simples demais e o sistema de depoimentos poderia ser melhor elaborado,
com a adição de uma área de rating do serviço. Analisar o upload e uso de fotos de perfil.

Esperamos melhorar muito o sistema com o passar do tempo, sobretudo o desenvolvimento das funcionalidades
necessárias.
