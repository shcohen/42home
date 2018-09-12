/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strnew.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/25 21:16:04 by shcohen           #+#    #+#             */
<<<<<<< HEAD
/*   Updated: 2018/07/18 16:52:00 by shcohen          ###   ########.fr       */
=======
/*   Updated: 2018/06/07 15:24:16 by shcohen          ###   ########.fr       */
>>>>>>> 210e901da71f918709e768c6518c4d226309c033
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strnew(size_t size)
{
	char	*str;
	size_t	i;

	i = 0;
	if (!(str = malloc(sizeof(char) * (size + 1))))
		return (NULL);
	while (i < size)
	{
		str[i] = '\0';
		i++;
	}
	str[i] = '\0';
	return (str);
}
