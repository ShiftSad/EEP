#include <stdio.h>

int main() {
    int withdrawalRequestedAmount;
    int availableNoteValues[] = {100, 50, 20, 10, 5, 2, 1};
    int calculatedNumberOfNotes[] = {0, 0, 0, 0, 0, 0, 0};
    int numberOfNoteTypes = 7;

    printf("Digite o valor do saque: ");
    scanf("%d", &withdrawalRequestedAmount);

    int amountStillToDistribute = withdrawalRequestedAmount;

    printf("Para um saque de %d, as notas sao:\n", withdrawalRequestedAmount);

    for (int noteTypeIndex = 0; noteTypeIndex < numberOfNoteTypes; noteTypeIndex++) {
        int currentNoteDenomination = availableNoteValues[noteTypeIndex];
        
        calculatedNumberOfNotes[noteTypeIndex] = amountStillToDistribute / currentNoteDenomination;
        
        amountStillToDistribute = amountStillToDistribute % currentNoteDenomination;

        if (calculatedNumberOfNotes[noteTypeIndex] > 0) {
            printf("%d nota(s) de %d\n", calculatedNumberOfNotes[noteTypeIndex], currentNoteDenomination);
        }
    }
}
