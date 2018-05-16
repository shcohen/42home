/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_memmove.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/16 22:58:18 by shcohen           #+#    #+#             */
/*   Updated: 2018/05/16 23:51:14 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

void	*ft_memmove(void *dest, const void *src, size_t len)
{
	size_t	i;

	i = len;
	if (len == 0)
		return (dest);
	if (src > dest)
	{
		dest = ft_memcpy(dest, src, len);
		return (dest);
	}
	while (i > 0)
	{
		((unsigned char*)dest)[i - 1] = ((unsigned char*)src)[i - 1];
		i--;
	}
	return (dest);
}
