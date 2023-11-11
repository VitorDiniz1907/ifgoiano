#include <stdio.h>
#include <stdlib.h>
#include "pilha.h"

int menu(){
	int opc;
	system("clear");
	printf("[0] - Sair.\n");
	printf("[1] - Criar Pilha.\n");	
	printf("[2] - Liberar Pilha.\n");	
	printf("[3] - Push.\n");	
	printf("[4] - Pop.\n");
	printf("[5] - Top.\n");
	printf("[6] - Verificar se pilha vazia.\n");
	printf("[7] - Mostrar a pilha.\n\n");
	printf("Escolha uma opção: ");	
	scanf("%i", &opc);
	return opc;
}

int main(){
	Pilha *p=NULL;
	int opc, vlr;
	int *aux;
	
	while(opc = menu()){
		switch(opc){
			case 1:
				if (p == NULL)
					p = criarPilha();
				if (p == NULL){
					printf("Falha ao criar a pilha.\n");
				}else{
					printf("Pilha criada.\n");
				}
				break;
			case 2:
				liberarPilha(&p);
				printf("Pilha liberada.\n");
				break;
			case 3:
				printf("valor: ");
				scanf("%i", &vlr);
				if (push(p, vlr)){
					printf("%i empilhado.\n", vlr);
				}else{
					printf("Falha ao empilhar %i\n", vlr);
				}
			break;
			case 4:
				if (pop(p)){
					printf("elemento desempilhado.\n");
				}else{
					printf("Falha ao desempilhar\n");
				}
			break;
			case 5:
				aux = top(p);
				if (aux == NULL){
					printf("Pilha vazia.\n");
				}else{
					printf("%i\n", *aux);
				}
			break;
			case 6:
				if (vazia(p))
					printf("Pilha vazia.\n");
				else
					printf("A pilha não está vazia.\n");
			break;
			case 7:
				mostrarPilha(p);
			break;
			default:
				printf("Opção inválida.\n");				
		}
		getchar();
		getchar();
	}	
}







