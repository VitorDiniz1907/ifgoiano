typedef struct pilha Pilha;

Pilha * criarPilha();
int push (Pilha *p, int vlr);
int pop (Pilha *p);
int * top (Pilha *p);
int vazia(Pilha *p);
void liberarPilha(Pilha **p);
void mostrarPilha(Pilha *p);

