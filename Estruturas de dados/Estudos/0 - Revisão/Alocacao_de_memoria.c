#include <stdlib.h>
#include <stdio.h>

typedef struct pessoa {
	int            peso;
	float          altura;
	struct pessoa  *prox;
} T_Pessoa;


main( )
{
    /* =====================  Alocação estática */
    T_Pessoa p1, p2;
    T_Pessoa vp [10];

    p1.peso = 89;
    p1.altura = 1.89;

    vp[0].peso = 90;
    vp[0].altura = 1.69;

    //printf("peso = %d\n",vp[0].peso);

    /* ======================= Alocação dinâmica */

    T_Pessoa *py, *px, *pz;
    int i;

    //printf("Tamanho = %d\n",sizeof(float));

    px = (T_Pessoa *) malloc (sizeof(T_Pessoa));
    py = (T_Pessoa *) malloc (sizeof(T_Pessoa));

    px->peso = 89;
    px->altura = 1.98;

    py->peso = 78;
    py->altura = 1.80;

    px->prox = py; // laranja

    printf("%d", py->peso); // 78
    py = NULL;
    printf("%d", (px-> prox)->peso); // 78

    py = (T_Pessoa *) malloc (sizeof(T_Pessoa)); // 3a pessoa

    (px->prox)->prox = py; // azul

    py = NULL;
}







