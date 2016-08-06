<?php 
class Paginator {
	function makePager($iCurr, $iEnd, $iLeft, $iRight)
	{
		if($iCurr > $iLeft && $iCurr < ($iEnd-$iRight))
		{
			for($i=$iCurr-$iLeft; $i<=$iCurr+$iRight; $i++)
			{
			echo '<button type="submit" 
			class="btn btn-primary btn-add-student btn-page" name="page" value="'.$i.'">'.$i.'</button>';
			}
		}

		elseif($iCurr<=$iLeft)
		{
			$iSlice = 1+$iLeft-$iCurr;
			for($i=1; $i<=$iCurr+($iRight+$iSlice); $i++)
			{
			echo '<button type="submit" 
			class="btn btn-primary btn-add-student btn-page" name="page" value="'.$i.'">'.$i.'</button>';
			}
		} 
		else
		{
			$iSlice = $iRight-($iEnd - $iCurr);
			for($i=$iCurr-($iLeft+$iSlice); $i<=$iEnd; $i++)
			{
			echo '<button type="submit" 
			class="btn btn-primary btn-add-student btn-page" name="page" value="'.$i.'">'.$i.'</button>';
			}
		}
	}
}