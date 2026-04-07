#include <stdlib.h>
#include <stdio.h>
#include <time.h>

main( )
{
    int vet[100000];
    int i;
    clock_t t_inicio, t_meio, t_fim;
    long long int Tempo_usado;  // em milisegundos

    t_inicio = clock(); // ======================================

    for (i=1;i<=100000;i++)
    {
            vet[i] = 0 + 1 * i;
            t_meio = clock(); // ==================================
            Tempo_usado = (t_meio - t_inicio) * 1000.0 / CLOCKS_PER_SEC;
            printf("Posicao= %d -- Tempo = %dms\n",i,Tempo_usado);

    }

    t_fim = clock(); // ==================================

    // resultado do tempo
    Tempo_usado = (t_fim - t_inicio) * 1000.0 / CLOCKS_PER_SEC;
    printf("\n\nTempo final: %d ms.", Tempo_usado);

}







