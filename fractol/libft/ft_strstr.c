/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strstr.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/17 21:42:29 by shcohen           #+#    #+#             */
/*   Updated: 2018/05/21 21:28:45 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strstr(const char *str, const char *to_find)
{
	int i;
	int j;

	i = 0;
	j = 0;
	if (!to_find[i])
		return ((char*)str);
	while (str[i] != '\0')
	{
		while (str[i + j] == to_find[j] || !to_find[j])
		{
			if (!to_find[j])
				return ((char*)str + i);
			j++;
		}
		j = 0;
		i++;
	}
	return (NULL);
}
