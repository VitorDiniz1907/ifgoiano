#include "stdio.h"
#include "stdlib.h"
int menu();
struct produto{
    char nome[50];
    char marca[50];
    char fabricacao[12];
    int codBarras;
    double compra;
    double venda;
};

typedef struct produto Produto;

int main(){

    int t;
    printf("Digite a quantidade de produtos a serem inseridos: ");
    scanf("%d", &t);

    Produto *prod = malloc(sizeof(Produto)*t);

    int m = menu();
    do{
        switch (m){
            case 1:{
                int cont = 0;
                if (cont == 10){
                    printf("Limite de itens inseridos");
                    break;
                }else{
                    for(int i = 0; i < 1; i++){
                        printf("Digite o nome do produto %d: ", i+1);
                        scanf("%s", &(prod[i].nome));
                        printf("Digite a marca do produto %d: ", i+1);
                        scanf("%s", &(prod[i].marca));
                        printf("Digite a data de fabricação do produto %d: ", i+1);
                        scanf("%s", &(prod[i].fabricacao));

                        printf("Digite o Código de Barras do produto %d: ", i+1);
                        scanf("%i", &(prod[i].codBarras));

                        printf("Digite o peço de venda do produto %d: ", i+1);
                        scanf("%lf", &(prod[i].venda));
                        printf("Digite o preço de custo do produto %d: ", i+1);
                        scanf("%lf", &(prod[i].compra));
                        cont++;
                        break;
                    }
                    
                }
                
            }break;

            case 2:{
                int p;
                printf("Qual a posição do item a ser alterado? ");
                scanf("%d", &p);

                printf("Digite o novo nome do produto %d: ", p);
                scanf("%s", &(prod[p].nome));
                printf("Digite a nova marca do produto %d: ", p);
                scanf("%s", &(prod[p].marca));
                printf("Digite a nova data de fabricação do produto %d: ", p);
                scanf("%s", &(prod[p].fabricacao));

                printf("Digite o novo Código de Barras do produto %d: ", p);
                scanf("%i", &(prod[p].codBarras));

                printf("Digite o novo peço de venda do produto %d: ", p);
                scanf("%lf", &(prod[p].venda));
                printf("Digite o novo preço de custo do produto %d: ", p);
                scanf("%lf", &(prod[p].compra));


            }break;

            case 3:{
                for(int i = 0; i < t; i++){
                    printf("Digite o nome do produto %d: ", i+1);
                    scanf("%s", &(prod[i].nome));
                    printf("Digite a marca do produto %d: ", i+1);
                    scanf("%s", &(prod[i].marca));
                    printf("Digite a data de fabricação do produto %d: ", i+1);
                    scanf("%s", &(prod[i].fabricacao));

                    printf("Digite o Código de Barras do produto %d: ", i+1);
                    scanf("%i", &(prod[i].codBarras));

                    printf("Digite o peço de venda do produto %d: ", i+1);
                    scanf("%lf", &(prod[i].venda));
                    printf("Digite o preço de custo do produto %d: ", i+1);
                    scanf("%lf", &(prod[i].compra));

                    printf("%d", (prod[i].venda-prod[i].compra));           
                }
            }break;

            case 4:{
                free(prod);
            }break;
            
            default:{
                break;
            }
        }

    }while(m != 0);


    return 0;
}


int menu(){
    int e;
    printf("Digite 1 para Adicionar Produto\n");
    printf("Digite 2 para Alterar um Produto\n");
    printf("Digite 3 para Mostrar Todos os Produtos e o Lucro por Produto\n");
    printf("Digite 4 para Desalocar Todos os produtos alocados dinamicamente\n");
    scanf("%i", &e);

    return e;
}