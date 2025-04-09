#include <stdio.h>

int main() {
    int idade, peso, nota;
    
    printf("Digite a idade: ");
    scanf("%d", &idade);
    
    printf("Digite o peso: ");
    scanf("%d", &peso);
    
    if (idade < 20) {
        if (peso <= 60) {
            nota = 9;
        } else if (peso <= 90) {
            nota = 8;
        } else {
            nota = 7;
        }
    } else if (idade <= 50) {
        if (peso <= 60) {
            nota = 6;
        } else if (peso <= 90) {
            nota = 5;
        } else {
            nota = 4;
        }
    } else {
        if (peso <= 60) {
            nota = 3;
        } else if (peso <= 90) {
            nota = 2;
        } else {
            nota = 1;
        }
    }
    
    printf("Nota: %d\n", nota);
    
    return 0;
}