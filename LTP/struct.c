#include "stdio.h"
#include "stdlib.h"

//Formulário com Nome, idade, telefone, email, cidade, profissão.
// .(Ponto) é operador de acesso para Struct
// ->(Seta) tbm é operador de acesso para Struct para alocação DINÂMICA
/*struct pessoa{
    char nome[50];
    char teledone[20];
    char cidade[30];
    int idade;
    char email[50];
    char profissao[20];
};
typedef struct pessoa Pessoa;
int main(){
    // Forma Normal
    // struct pessoa joao; // Joao é a variável do tipo pessoa
    // joao.idade = 36;    
    // printf("Idade de João é %d\n", joao.idade);

    //Pessoa alunos[2]; // Alunos é a variável do tipo pessoa
    //alunos[0].idade = 18;
    //alunos[1].idade = 20;
    //printf("Idade de um aluno é %d e do outro é %d\n", alunos[0].idade, alunos[1].idade);

    //Dinamicamente alocado
    Pessoa *maria = malloc(sizeof(Pessoa));
    if(maria != NULL){
        maria->idade = 25;
        printf("Idade de Maria é %d\n", maria->idade);
        printf("Informe o e-mail: \n");
        fgets(maria->email, 50, stdin);
        printf("O E-mail de Maria informado é: %s\n", maria->email);
        free(maria);
    }


    return 0;
}*/

/*Cada aluno é representado pelas seguintes caracteristicas: Nome, nº matricula, nota1, nota2, nota3.
Alocar 5 alunos e calcular a média individual por aluno e coeficiente da turma */

struct aluno{
    char nome[50];
    int matricula;
    double n1;
    double n2;
    double n3;
};

typedef struct aluno Aluno;

int main(){
    Aluno *alunos = malloc(sizeof(Aluno) * 5);
    if(alunos != NULL){
        for(int i = 0; i < 5; i++){
            printf("Digite o nome do Aluno %d", i+1);
            
        }
    }
}